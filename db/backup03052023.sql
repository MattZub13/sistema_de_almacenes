toc.dat                                                                                             0000600 0004000 0002000 00000042110 14424601606 0014440 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        PGDMP       1    ;                {            db    15.2    15.2 9    @           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false         A           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false         B           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false         C           1262    25866    db    DATABASE     u   CREATE DATABASE db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';
    DROP DATABASE db;
                postgres    false         �            1259    25867    almacen    TABLE     �   CREATE TABLE public.almacen (
    id_almacen integer NOT NULL,
    direccion_almacen character varying(70) NOT NULL,
    telefono character varying(10) NOT NULL,
    responsable character varying(25),
    capacidad integer NOT NULL
);
    DROP TABLE public.almacen;
       public         heap    postgres    false         �            1259    25870    Almacen_id_almacen_seq    SEQUENCE     �   CREATE SEQUENCE public."Almacen_id_almacen_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public."Almacen_id_almacen_seq";
       public          postgres    false    214         D           0    0    Almacen_id_almacen_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public."Almacen_id_almacen_seq" OWNED BY public.almacen.id_almacen;
          public          postgres    false    215         �            1259    25871    articulo    TABLE     K  CREATE TABLE public.articulo (
    id_articulo integer NOT NULL,
    nombre_articulo character varying(30) NOT NULL,
    descripcion_articulo character varying(60) NOT NULL,
    precio_unitario numeric NOT NULL,
    id_categoria integer NOT NULL,
    id_almacen integer NOT NULL,
    estado_articulo smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.articulo;
       public         heap    postgres    false         �            1259    25877    Articulo_id_articulo_seq    SEQUENCE     �   CREATE SEQUENCE public."Articulo_id_articulo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."Articulo_id_articulo_seq";
       public          postgres    false    216         E           0    0    Articulo_id_articulo_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public."Articulo_id_articulo_seq" OWNED BY public.articulo.id_articulo;
          public          postgres    false    217         �            1259    25878 	   categoria    TABLE     �   CREATE TABLE public.categoria (
    id_categoria integer NOT NULL,
    nombre_categoria character varying(25) NOT NULL,
    estado_categoria smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.categoria;
       public         heap    postgres    false         �            1259    25882    Categoria_id_categoria_seq    SEQUENCE     �   CREATE SEQUENCE public."Categoria_id_categoria_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."Categoria_id_categoria_seq";
       public          postgres    false    218         F           0    0    Categoria_id_categoria_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public."Categoria_id_categoria_seq" OWNED BY public.categoria.id_categoria;
          public          postgres    false    219         �            1259    25883    empleado    TABLE     �  CREATE TABLE public.empleado (
    id_empleado integer NOT NULL,
    nombre character varying(25) NOT NULL,
    apellido_paterno character varying(25) NOT NULL,
    apellido_materno character varying(25) NOT NULL,
    correo_empleado character varying(30) NOT NULL,
    estado_empleado smallint DEFAULT 1 NOT NULL,
    password character varying(30) NOT NULL,
    id_oficina integer
);
    DROP TABLE public.empleado;
       public         heap    postgres    false         �            1259    25887    empleado_id_empleado_seq    SEQUENCE     �   CREATE SEQUENCE public.empleado_id_empleado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.empleado_id_empleado_seq;
       public          postgres    false    220         G           0    0    empleado_id_empleado_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.empleado_id_empleado_seq OWNED BY public.empleado.id_empleado;
          public          postgres    false    221         �            1259    25888    oficina    TABLE     9  CREATE TABLE public.oficina (
    id_oficina integer NOT NULL,
    nombre_oficina character varying(50) NOT NULL,
    descripcion_oficina character varying(60) NOT NULL,
    ubicacion_oficina character varying(40) NOT NULL,
    telefono_oficina integer NOT NULL,
    estado_oficina smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.oficina;
       public         heap    postgres    false         �            1259    25892    oficina_id_oficina_seq    SEQUENCE     �   CREATE SEQUENCE public.oficina_id_oficina_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.oficina_id_oficina_seq;
       public          postgres    false    222         H           0    0    oficina_id_oficina_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.oficina_id_oficina_seq OWNED BY public.oficina.id_oficina;
          public          postgres    false    223         �            1259    25893 	   proveedor    TABLE     :  CREATE TABLE public.proveedor (
    id_proveedor integer NOT NULL,
    nombre_proveedor character varying(30) NOT NULL,
    direccion_proveedor character varying(60) NOT NULL,
    correo_proveedor character varying(50) NOT NULL,
    id_almacen integer NOT NULL,
    estado_proveedor smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.proveedor;
       public         heap    postgres    false         �            1259    25897    proveedor_id_proveedor_seq    SEQUENCE     �   CREATE SEQUENCE public.proveedor_id_proveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.proveedor_id_proveedor_seq;
       public          postgres    false    224         I           0    0    proveedor_id_proveedor_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.proveedor_id_proveedor_seq OWNED BY public.proveedor.id_proveedor;
          public          postgres    false    225         �            1259    25937    surtidor    TABLE     �   CREATE TABLE public.surtidor (
    id_surtidor integer NOT NULL,
    ubicacion_surtidor character varying(150) NOT NULL,
    telefono_surtidor character varying(150) NOT NULL,
    estado_surtidor smallint DEFAULT '1'::smallint NOT NULL
);
    DROP TABLE public.surtidor;
       public         heap    postgres    false         �            1259    25936    surtidor_id_surtidor_seq    SEQUENCE     �   CREATE SEQUENCE public.surtidor_id_surtidor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.surtidor_id_surtidor_seq;
       public          postgres    false    227         J           0    0    surtidor_id_surtidor_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.surtidor_id_surtidor_seq OWNED BY public.surtidor.id_surtidor;
          public          postgres    false    226         �           2604    25944    almacen id_almacen    DEFAULT     z   ALTER TABLE ONLY public.almacen ALTER COLUMN id_almacen SET DEFAULT nextval('public."Almacen_id_almacen_seq"'::regclass);
 A   ALTER TABLE public.almacen ALTER COLUMN id_almacen DROP DEFAULT;
       public          postgres    false    215    214         �           2604    25945    articulo id_articulo    DEFAULT     ~   ALTER TABLE ONLY public.articulo ALTER COLUMN id_articulo SET DEFAULT nextval('public."Articulo_id_articulo_seq"'::regclass);
 C   ALTER TABLE public.articulo ALTER COLUMN id_articulo DROP DEFAULT;
       public          postgres    false    217    216         �           2604    25946    categoria id_categoria    DEFAULT     �   ALTER TABLE ONLY public.categoria ALTER COLUMN id_categoria SET DEFAULT nextval('public."Categoria_id_categoria_seq"'::regclass);
 E   ALTER TABLE public.categoria ALTER COLUMN id_categoria DROP DEFAULT;
       public          postgres    false    219    218         �           2604    25947    empleado id_empleado    DEFAULT     |   ALTER TABLE ONLY public.empleado ALTER COLUMN id_empleado SET DEFAULT nextval('public.empleado_id_empleado_seq'::regclass);
 C   ALTER TABLE public.empleado ALTER COLUMN id_empleado DROP DEFAULT;
       public          postgres    false    221    220         �           2604    25948    oficina id_oficina    DEFAULT     x   ALTER TABLE ONLY public.oficina ALTER COLUMN id_oficina SET DEFAULT nextval('public.oficina_id_oficina_seq'::regclass);
 A   ALTER TABLE public.oficina ALTER COLUMN id_oficina DROP DEFAULT;
       public          postgres    false    223    222         �           2604    25949    proveedor id_proveedor    DEFAULT     �   ALTER TABLE ONLY public.proveedor ALTER COLUMN id_proveedor SET DEFAULT nextval('public.proveedor_id_proveedor_seq'::regclass);
 E   ALTER TABLE public.proveedor ALTER COLUMN id_proveedor DROP DEFAULT;
       public          postgres    false    225    224         �           2604    25950    surtidor id_surtidor    DEFAULT     |   ALTER TABLE ONLY public.surtidor ALTER COLUMN id_surtidor SET DEFAULT nextval('public.surtidor_id_surtidor_seq'::regclass);
 C   ALTER TABLE public.surtidor ALTER COLUMN id_surtidor DROP DEFAULT;
       public          postgres    false    226    227    227         0          0    25867    almacen 
   TABLE DATA           b   COPY public.almacen (id_almacen, direccion_almacen, telefono, responsable, capacidad) FROM stdin;
    public          postgres    false    214       3376.dat 2          0    25871    articulo 
   TABLE DATA           �   COPY public.articulo (id_articulo, nombre_articulo, descripcion_articulo, precio_unitario, id_categoria, id_almacen, estado_articulo) FROM stdin;
    public          postgres    false    216       3378.dat 4          0    25878 	   categoria 
   TABLE DATA           U   COPY public.categoria (id_categoria, nombre_categoria, estado_categoria) FROM stdin;
    public          postgres    false    218       3380.dat 6          0    25883    empleado 
   TABLE DATA           �   COPY public.empleado (id_empleado, nombre, apellido_paterno, apellido_materno, correo_empleado, estado_empleado, password, id_oficina) FROM stdin;
    public          postgres    false    220       3382.dat 8          0    25888    oficina 
   TABLE DATA           �   COPY public.oficina (id_oficina, nombre_oficina, descripcion_oficina, ubicacion_oficina, telefono_oficina, estado_oficina) FROM stdin;
    public          postgres    false    222       3384.dat :          0    25893 	   proveedor 
   TABLE DATA           �   COPY public.proveedor (id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen, estado_proveedor) FROM stdin;
    public          postgres    false    224       3386.dat =          0    25937    surtidor 
   TABLE DATA           g   COPY public.surtidor (id_surtidor, ubicacion_surtidor, telefono_surtidor, estado_surtidor) FROM stdin;
    public          postgres    false    227       3389.dat K           0    0    Almacen_id_almacen_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public."Almacen_id_almacen_seq"', 1, true);
          public          postgres    false    215         L           0    0    Articulo_id_articulo_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."Articulo_id_articulo_seq"', 12, true);
          public          postgres    false    217         M           0    0    Categoria_id_categoria_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public."Categoria_id_categoria_seq"', 3, true);
          public          postgres    false    219         N           0    0    empleado_id_empleado_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.empleado_id_empleado_seq', 7, true);
          public          postgres    false    221         O           0    0    oficina_id_oficina_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.oficina_id_oficina_seq', 2, true);
          public          postgres    false    223         P           0    0    proveedor_id_proveedor_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.proveedor_id_proveedor_seq', 3, true);
          public          postgres    false    225         Q           0    0    surtidor_id_surtidor_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.surtidor_id_surtidor_seq', 1, true);
          public          postgres    false    226         �           2606    25905    almacen Almacen_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.almacen
    ADD CONSTRAINT "Almacen_pkey" PRIMARY KEY (id_almacen);
 @   ALTER TABLE ONLY public.almacen DROP CONSTRAINT "Almacen_pkey";
       public            postgres    false    214         �           2606    25907    articulo Articulo_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT "Articulo_pkey" PRIMARY KEY (id_articulo);
 B   ALTER TABLE ONLY public.articulo DROP CONSTRAINT "Articulo_pkey";
       public            postgres    false    216         �           2606    25909    categoria Categoria_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT "Categoria_pkey" PRIMARY KEY (id_categoria);
 D   ALTER TABLE ONLY public.categoria DROP CONSTRAINT "Categoria_pkey";
       public            postgres    false    218         �           2606    25911    empleado empleado_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (id_empleado);
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_pkey;
       public            postgres    false    220         �           2606    25913    oficina oficina_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.oficina
    ADD CONSTRAINT oficina_pkey PRIMARY KEY (id_oficina);
 >   ALTER TABLE ONLY public.oficina DROP CONSTRAINT oficina_pkey;
       public            postgres    false    222         �           2606    25915    proveedor proveedor_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (id_proveedor);
 B   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_pkey;
       public            postgres    false    224         �           2606    25943    surtidor surtidor_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.surtidor
    ADD CONSTRAINT surtidor_pkey PRIMARY KEY (id_surtidor);
 @   ALTER TABLE ONLY public.surtidor DROP CONSTRAINT surtidor_pkey;
       public            postgres    false    227         �           2606    25916    articulo fk_almacen    FK CONSTRAINT        ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 =   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_almacen;
       public          postgres    false    214    216    3217         �           2606    25921    proveedor fk_almacen    FK CONSTRAINT     �   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 >   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT fk_almacen;
       public          postgres    false    3217    224    214         �           2606    25926    articulo fk_categoria    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES public.categoria(id_categoria);
 ?   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_categoria;
       public          postgres    false    3221    216    218         �           2606    25931    empleado fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina) NOT VALID;
 =   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fk_oficina;
       public          postgres    false    3225    220    222                                                                                                                                                                                                                                                                                                                                                                                                                                                                3376.dat                                                                                            0000600 0004000 0002000 00000000072 14424601606 0014256 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Calle Colon entre ingavi y bolivar	12345678	\N	400
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                      3378.dat                                                                                            0000600 0004000 0002000 00000001021 14424601606 0014253 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        7	hojas12	segundo ejemplo de la base de datos	23	1	1	1
8	fsdf	dfasfdsafdaf	35	1	1	1
9	gsdaga	hsthaehE	42	1	1	1
10	marcador negro	marcador de color negro	3	3	1	1
5	hojas de colores	paquete de hojas de distintos colores	15	1	1	1
11	dfdasf	prueba de insercion con las notificaciones	34	3	1	1
12	prueba de C	prueba 1 Crud para articulo	32	3	1	1
6	prueba U	Prueba del actualizar del crud	42	2	1	1
4	prueba D	prueba del Borrar del crup	42	1	1	0
1	hojas bond tamanio carta	Paquete de hojas bond tamanio carta color blanco	10	1	1	1
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                               3380.dat                                                                                            0000600 0004000 0002000 00000000063 14424601606 0014251 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        3	marcadores	1
1	hojas de papel	1
2	lapices	1
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                             3382.dat                                                                                            0000600 0004000 0002000 00000000334 14424601606 0014254 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Mateo	Zubieta	Yucra	mateozubieta13@gmail.com	1	12345	1
3	ejemplo de	actualizar	la tabla	correo@coreo.com	1	12345	2
7	grga	ghsths	hrdhtw	qgf@correo.com	0	Fellsing12369.	1
2	anze	gustavo		correo@correo.com	1	1234	1
\.


                                                                                                                                                                                                                                                                                                    3384.dat                                                                                            0000600 0004000 0002000 00000000272 14424601606 0014257 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	departamento de ciencias exactas	oficina x	campus central	70224698	1
2	departamento de comunicion	oficina donde se trata los asuntos de difusion de la u	campus central	70224698	1
\.


                                                                                                                                                                                                                                                                                                                                      3386.dat                                                                                            0000600 0004000 0002000 00000000263 14424601606 0014261 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	Matias Ramirez	la casa de tu madre	correo@correo.com	1	1
2	ejemplo de insert	a proveedor	correo@correo.com	1	1
3	ejemplo de insert	a la tabla proveedor	correo@core.com	1	1
\.


                                                                                                                                                                                                                                                                                                                                             3389.dat                                                                                            0000600 0004000 0002000 00000000033 14424601606 0014257 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        1	alto seca	1231244	1
\.


                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                     restore.sql                                                                                         0000600 0004000 0002000 00000034766 14424601606 0015407 0                                                                                                    ustar 00postgres                        postgres                        0000000 0000000                                                                                                                                                                        --
-- NOTE:
--
-- File paths need to be edited. Search for $$PATH$$ and
-- replace it with the path to the directory containing
-- the extracted data files.
--
--
-- PostgreSQL database dump
--

-- Dumped from database version 15.2
-- Dumped by pg_dump version 15.2

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

DROP DATABASE db;
--
-- Name: db; Type: DATABASE; Schema: -; Owner: postgres
--

CREATE DATABASE db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Spain.1252';


ALTER DATABASE db OWNER TO postgres;

\connect db

SET statement_timeout = 0;
SET lock_timeout = 0;
SET idle_in_transaction_session_timeout = 0;
SET client_encoding = 'UTF8';
SET standard_conforming_strings = on;
SELECT pg_catalog.set_config('search_path', '', false);
SET check_function_bodies = false;
SET xmloption = content;
SET client_min_messages = warning;
SET row_security = off;

SET default_tablespace = '';

SET default_table_access_method = heap;

--
-- Name: almacen; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.almacen (
    id_almacen integer NOT NULL,
    direccion_almacen character varying(70) NOT NULL,
    telefono character varying(10) NOT NULL,
    responsable character varying(25),
    capacidad integer NOT NULL
);


ALTER TABLE public.almacen OWNER TO postgres;

--
-- Name: Almacen_id_almacen_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Almacen_id_almacen_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Almacen_id_almacen_seq" OWNER TO postgres;

--
-- Name: Almacen_id_almacen_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Almacen_id_almacen_seq" OWNED BY public.almacen.id_almacen;


--
-- Name: articulo; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.articulo (
    id_articulo integer NOT NULL,
    nombre_articulo character varying(30) NOT NULL,
    descripcion_articulo character varying(60) NOT NULL,
    precio_unitario numeric NOT NULL,
    id_categoria integer NOT NULL,
    id_almacen integer NOT NULL,
    estado_articulo smallint DEFAULT 1 NOT NULL
);


ALTER TABLE public.articulo OWNER TO postgres;

--
-- Name: Articulo_id_articulo_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Articulo_id_articulo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Articulo_id_articulo_seq" OWNER TO postgres;

--
-- Name: Articulo_id_articulo_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Articulo_id_articulo_seq" OWNED BY public.articulo.id_articulo;


--
-- Name: categoria; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.categoria (
    id_categoria integer NOT NULL,
    nombre_categoria character varying(25) NOT NULL,
    estado_categoria smallint DEFAULT 1 NOT NULL
);


ALTER TABLE public.categoria OWNER TO postgres;

--
-- Name: Categoria_id_categoria_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public."Categoria_id_categoria_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public."Categoria_id_categoria_seq" OWNER TO postgres;

--
-- Name: Categoria_id_categoria_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public."Categoria_id_categoria_seq" OWNED BY public.categoria.id_categoria;


--
-- Name: empleado; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.empleado (
    id_empleado integer NOT NULL,
    nombre character varying(25) NOT NULL,
    apellido_paterno character varying(25) NOT NULL,
    apellido_materno character varying(25) NOT NULL,
    correo_empleado character varying(30) NOT NULL,
    estado_empleado smallint DEFAULT 1 NOT NULL,
    password character varying(30) NOT NULL,
    id_oficina integer
);


ALTER TABLE public.empleado OWNER TO postgres;

--
-- Name: empleado_id_empleado_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.empleado_id_empleado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.empleado_id_empleado_seq OWNER TO postgres;

--
-- Name: empleado_id_empleado_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.empleado_id_empleado_seq OWNED BY public.empleado.id_empleado;


--
-- Name: oficina; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.oficina (
    id_oficina integer NOT NULL,
    nombre_oficina character varying(50) NOT NULL,
    descripcion_oficina character varying(60) NOT NULL,
    ubicacion_oficina character varying(40) NOT NULL,
    telefono_oficina integer NOT NULL,
    estado_oficina smallint DEFAULT 1 NOT NULL
);


ALTER TABLE public.oficina OWNER TO postgres;

--
-- Name: oficina_id_oficina_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.oficina_id_oficina_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.oficina_id_oficina_seq OWNER TO postgres;

--
-- Name: oficina_id_oficina_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.oficina_id_oficina_seq OWNED BY public.oficina.id_oficina;


--
-- Name: proveedor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.proveedor (
    id_proveedor integer NOT NULL,
    nombre_proveedor character varying(30) NOT NULL,
    direccion_proveedor character varying(60) NOT NULL,
    correo_proveedor character varying(50) NOT NULL,
    id_almacen integer NOT NULL,
    estado_proveedor smallint DEFAULT 1 NOT NULL
);


ALTER TABLE public.proveedor OWNER TO postgres;

--
-- Name: proveedor_id_proveedor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.proveedor_id_proveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.proveedor_id_proveedor_seq OWNER TO postgres;

--
-- Name: proveedor_id_proveedor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.proveedor_id_proveedor_seq OWNED BY public.proveedor.id_proveedor;


--
-- Name: surtidor; Type: TABLE; Schema: public; Owner: postgres
--

CREATE TABLE public.surtidor (
    id_surtidor integer NOT NULL,
    ubicacion_surtidor character varying(150) NOT NULL,
    telefono_surtidor character varying(150) NOT NULL,
    estado_surtidor smallint DEFAULT '1'::smallint NOT NULL
);


ALTER TABLE public.surtidor OWNER TO postgres;

--
-- Name: surtidor_id_surtidor_seq; Type: SEQUENCE; Schema: public; Owner: postgres
--

CREATE SEQUENCE public.surtidor_id_surtidor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;


ALTER TABLE public.surtidor_id_surtidor_seq OWNER TO postgres;

--
-- Name: surtidor_id_surtidor_seq; Type: SEQUENCE OWNED BY; Schema: public; Owner: postgres
--

ALTER SEQUENCE public.surtidor_id_surtidor_seq OWNED BY public.surtidor.id_surtidor;


--
-- Name: almacen id_almacen; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.almacen ALTER COLUMN id_almacen SET DEFAULT nextval('public."Almacen_id_almacen_seq"'::regclass);


--
-- Name: articulo id_articulo; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo ALTER COLUMN id_articulo SET DEFAULT nextval('public."Articulo_id_articulo_seq"'::regclass);


--
-- Name: categoria id_categoria; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria ALTER COLUMN id_categoria SET DEFAULT nextval('public."Categoria_id_categoria_seq"'::regclass);


--
-- Name: empleado id_empleado; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.empleado ALTER COLUMN id_empleado SET DEFAULT nextval('public.empleado_id_empleado_seq'::regclass);


--
-- Name: oficina id_oficina; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oficina ALTER COLUMN id_oficina SET DEFAULT nextval('public.oficina_id_oficina_seq'::regclass);


--
-- Name: proveedor id_proveedor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proveedor ALTER COLUMN id_proveedor SET DEFAULT nextval('public.proveedor_id_proveedor_seq'::regclass);


--
-- Name: surtidor id_surtidor; Type: DEFAULT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.surtidor ALTER COLUMN id_surtidor SET DEFAULT nextval('public.surtidor_id_surtidor_seq'::regclass);


--
-- Data for Name: almacen; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.almacen (id_almacen, direccion_almacen, telefono, responsable, capacidad) FROM stdin;
\.
COPY public.almacen (id_almacen, direccion_almacen, telefono, responsable, capacidad) FROM '$$PATH$$/3376.dat';

--
-- Data for Name: articulo; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.articulo (id_articulo, nombre_articulo, descripcion_articulo, precio_unitario, id_categoria, id_almacen, estado_articulo) FROM stdin;
\.
COPY public.articulo (id_articulo, nombre_articulo, descripcion_articulo, precio_unitario, id_categoria, id_almacen, estado_articulo) FROM '$$PATH$$/3378.dat';

--
-- Data for Name: categoria; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.categoria (id_categoria, nombre_categoria, estado_categoria) FROM stdin;
\.
COPY public.categoria (id_categoria, nombre_categoria, estado_categoria) FROM '$$PATH$$/3380.dat';

--
-- Data for Name: empleado; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.empleado (id_empleado, nombre, apellido_paterno, apellido_materno, correo_empleado, estado_empleado, password, id_oficina) FROM stdin;
\.
COPY public.empleado (id_empleado, nombre, apellido_paterno, apellido_materno, correo_empleado, estado_empleado, password, id_oficina) FROM '$$PATH$$/3382.dat';

--
-- Data for Name: oficina; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.oficina (id_oficina, nombre_oficina, descripcion_oficina, ubicacion_oficina, telefono_oficina, estado_oficina) FROM stdin;
\.
COPY public.oficina (id_oficina, nombre_oficina, descripcion_oficina, ubicacion_oficina, telefono_oficina, estado_oficina) FROM '$$PATH$$/3384.dat';

--
-- Data for Name: proveedor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.proveedor (id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen, estado_proveedor) FROM stdin;
\.
COPY public.proveedor (id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen, estado_proveedor) FROM '$$PATH$$/3386.dat';

--
-- Data for Name: surtidor; Type: TABLE DATA; Schema: public; Owner: postgres
--

COPY public.surtidor (id_surtidor, ubicacion_surtidor, telefono_surtidor, estado_surtidor) FROM stdin;
\.
COPY public.surtidor (id_surtidor, ubicacion_surtidor, telefono_surtidor, estado_surtidor) FROM '$$PATH$$/3389.dat';

--
-- Name: Almacen_id_almacen_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Almacen_id_almacen_seq"', 1, true);


--
-- Name: Articulo_id_articulo_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Articulo_id_articulo_seq"', 12, true);


--
-- Name: Categoria_id_categoria_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public."Categoria_id_categoria_seq"', 3, true);


--
-- Name: empleado_id_empleado_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.empleado_id_empleado_seq', 7, true);


--
-- Name: oficina_id_oficina_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.oficina_id_oficina_seq', 2, true);


--
-- Name: proveedor_id_proveedor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.proveedor_id_proveedor_seq', 3, true);


--
-- Name: surtidor_id_surtidor_seq; Type: SEQUENCE SET; Schema: public; Owner: postgres
--

SELECT pg_catalog.setval('public.surtidor_id_surtidor_seq', 1, true);


--
-- Name: almacen Almacen_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.almacen
    ADD CONSTRAINT "Almacen_pkey" PRIMARY KEY (id_almacen);


--
-- Name: articulo Articulo_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT "Articulo_pkey" PRIMARY KEY (id_articulo);


--
-- Name: categoria Categoria_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT "Categoria_pkey" PRIMARY KEY (id_categoria);


--
-- Name: empleado empleado_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (id_empleado);


--
-- Name: oficina oficina_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.oficina
    ADD CONSTRAINT oficina_pkey PRIMARY KEY (id_oficina);


--
-- Name: proveedor proveedor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (id_proveedor);


--
-- Name: surtidor surtidor_pkey; Type: CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.surtidor
    ADD CONSTRAINT surtidor_pkey PRIMARY KEY (id_surtidor);


--
-- Name: articulo fk_almacen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);


--
-- Name: proveedor fk_almacen; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);


--
-- Name: articulo fk_categoria; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES public.categoria(id_categoria);


--
-- Name: empleado fk_oficina; Type: FK CONSTRAINT; Schema: public; Owner: postgres
--

ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina) NOT VALID;


--
-- PostgreSQL database dump complete
--

                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                          