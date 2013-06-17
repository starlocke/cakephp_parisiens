--
-- PostgreSQL database dump
--

SET statement_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SET check_function_bodies = false;
SET client_min_messages = warning;

--
-- Name: test; Type: SCHEMA; Schema: -; Owner: box
--

CREATE SCHEMA test;


ALTER SCHEMA test OWNER TO box;

--
-- Name: plpgsql; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS plpgsql WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION plpgsql; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION plpgsql IS 'PL/pgSQL procedural language';


--
-- Name: adminpack; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS adminpack WITH SCHEMA pg_catalog;


--
-- Name: EXTENSION adminpack; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION adminpack IS 'administrative functions for PostgreSQL';


--
-- Name: uuid-ossp; Type: EXTENSION; Schema: -; Owner: 
--

CREATE EXTENSION IF NOT EXISTS "uuid-ossp" WITH SCHEMA public;


--
-- Name: EXTENSION "uuid-ossp"; Type: COMMENT; Schema: -; Owner: 
--

COMMENT ON EXTENSION "uuid-ossp" IS 'generate universally unique identifiers (UUIDs)';


SET search_path = public, pg_catalog;

--
-- Name: count_integer_elements_equal(integer[], integer); Type: FUNCTION; Schema: public; Owner: box
--

CREATE FUNCTION count_integer_elements_equal(integer[], integer) RETURNS bigint
    LANGUAGE sql
    AS $_$
  SELECT c
  FROM
  (
    SELECT i, count(*) c
    FROM
      (SELECT unnest($1::integer[]) i) i
    GROUP BY i ORDER BY c DESC
  ) foo
  WHERE i = $2
  ;
$_$;


ALTER FUNCTION public.count_integer_elements_equal(integer[], integer) OWNER TO box;

--
-- Name: count_integer_elements_outside_range(integer[], integer, integer); Type: FUNCTION; Schema: public; Owner: box
--

CREATE FUNCTION count_integer_elements_outside_range(integer[], integer, integer) RETURNS bigint
    LANGUAGE sql
    AS $_$
  SELECT
    COALESCE(SUM(c)::bigint, 0)
  FROM
  (
    SELECT c
    FROM
    (
      SELECT i, count(*) c
      FROM
        (SELECT unnest($1::integer[]) i) i
      GROUP BY i ORDER BY c DESC
    ) foo
    WHERE
      i IS NULL
      OR
      i < $2
      OR
      i > $3
  ) bar
  ;
$_$;


ALTER FUNCTION public.count_integer_elements_outside_range(integer[], integer, integer) OWNER TO box;

SET search_path = test, pg_catalog;

--
-- Name: count_integer_elements_equal(integer[], integer); Type: FUNCTION; Schema: test; Owner: box
--

CREATE FUNCTION count_integer_elements_equal(integer[], integer) RETURNS bigint
    LANGUAGE sql
    AS $_$
  SELECT COALESCE(c,0)
  FROM
  (
    SELECT i, count(*) c
    FROM
      (SELECT unnest($1::integer[]) i) i
    GROUP BY i ORDER BY c DESC
  ) foo
  WHERE i = $2
  ;
$_$;


ALTER FUNCTION test.count_integer_elements_equal(integer[], integer) OWNER TO box;

--
-- Name: count_integer_elements_outside_range(integer[], integer, integer); Type: FUNCTION; Schema: test; Owner: box
--

CREATE FUNCTION count_integer_elements_outside_range(integer[], integer, integer) RETURNS bigint
    LANGUAGE sql
    AS $_$
  SELECT
    COALESCE(SUM(c)::bigint, 0)
  FROM
  (
    SELECT c
    FROM
    (
      SELECT i, count(*) c
      FROM
        (SELECT unnest($1::integer[]) i) i
      GROUP BY i ORDER BY c DESC
    ) foo
    WHERE
      i IS NULL
      OR
      i < $2
      OR
      i > $3
  ) bar
  ;
$_$;


ALTER FUNCTION test.count_integer_elements_outside_range(integer[], integer, integer) OWNER TO box;

SET search_path = public, pg_catalog;

SET default_tablespace = '';

SET default_with_oids = false;

--
-- Name: dep; Type: TABLE; Schema: public; Owner: box; Tablespace: 
--

CREATE TABLE dep (
    id integer NOT NULL,
    name character varying(32)
);


ALTER TABLE public.dep OWNER TO box;

--
-- Name: emp; Type: TABLE; Schema: public; Owner: box; Tablespace: 
--

CREATE TABLE emp (
    id integer NOT NULL,
    name character varying(32),
    salary integer,
    dept integer
);


ALTER TABLE public.emp OWNER TO box;

--
-- Name: survey_nqvr; Type: TABLE; Schema: public; Owner: box; Tablespace: 
--

CREATE TABLE survey_nqvr (
    id uuid NOT NULL,
    q1 boolean,
    q2 boolean,
    q3 integer,
    q4 integer[],
    q5 integer[],
    q6 integer,
    created timestamp without time zone
);


ALTER TABLE public.survey_nqvr OWNER TO box;

--
-- Name: survey_pma; Type: TABLE; Schema: public; Owner: box; Tablespace: 
--

CREATE TABLE survey_pma (
    id uuid NOT NULL,
    q1 integer,
    q2 integer,
    q3 integer[],
    q4 boolean,
    created timestamp without time zone
);


ALTER TABLE public.survey_pma OWNER TO box;

--
-- Name: survey_sm; Type: TABLE; Schema: public; Owner: box; Tablespace: 
--

CREATE TABLE survey_sm (
    id uuid NOT NULL,
    q1 integer[],
    q2 integer[],
    created timestamp without time zone
);


ALTER TABLE public.survey_sm OWNER TO box;

--
-- Name: dep_pkey; Type: CONSTRAINT; Schema: public; Owner: box; Tablespace: 
--

ALTER TABLE ONLY dep
    ADD CONSTRAINT dep_pkey PRIMARY KEY (id);


--
-- Name: emp_pkey; Type: CONSTRAINT; Schema: public; Owner: box; Tablespace: 
--

ALTER TABLE ONLY emp
    ADD CONSTRAINT emp_pkey PRIMARY KEY (id);


--
-- Name: survey_nqvr_pkey; Type: CONSTRAINT; Schema: public; Owner: box; Tablespace: 
--

ALTER TABLE ONLY survey_nqvr
    ADD CONSTRAINT survey_nqvr_pkey PRIMARY KEY (id);


--
-- Name: survey_pma_pkey; Type: CONSTRAINT; Schema: public; Owner: box; Tablespace: 
--

ALTER TABLE ONLY survey_pma
    ADD CONSTRAINT survey_pma_pkey PRIMARY KEY (id);


--
-- Name: survey_sm_pkey; Type: CONSTRAINT; Schema: public; Owner: box; Tablespace: 
--

ALTER TABLE ONLY survey_sm
    ADD CONSTRAINT survey_sm_pkey PRIMARY KEY (id);


--
-- Name: public; Type: ACL; Schema: -; Owner: postgres
--

REVOKE ALL ON SCHEMA public FROM PUBLIC;
REVOKE ALL ON SCHEMA public FROM postgres;
GRANT ALL ON SCHEMA public TO postgres;
GRANT ALL ON SCHEMA public TO PUBLIC;


--
-- PostgreSQL database dump complete
--

