PGDMP                          {            bd2    15.2    15.2 �    �           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            �           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            �           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            �           1262    74560    bd2    DATABASE     w   CREATE DATABASE bd2 WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Mexico.1252';
    DROP DATABASE bd2;
                postgres    false            �            1259    74561    almacen    TABLE     �   CREATE TABLE public.almacen (
    id_almacen integer NOT NULL,
    direccion_almacen character varying(70) NOT NULL,
    telefono character varying(10) NOT NULL,
    responsable character varying(25),
    capacidad integer NOT NULL
);
    DROP TABLE public.almacen;
       public         heap    postgres    false            �            1259    74564    Almacen_id_almacen_seq    SEQUENCE     �   CREATE SEQUENCE public."Almacen_id_almacen_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public."Almacen_id_almacen_seq";
       public          postgres    false    214            �           0    0    Almacen_id_almacen_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public."Almacen_id_almacen_seq" OWNED BY public.almacen.id_almacen;
          public          postgres    false    215            �            1259    74565    articulo    TABLE     K  CREATE TABLE public.articulo (
    id_articulo integer NOT NULL,
    nombre_articulo character varying(30) NOT NULL,
    descripcion_articulo character varying(60) NOT NULL,
    precio_unitario numeric NOT NULL,
    id_categoria integer NOT NULL,
    id_almacen integer NOT NULL,
    estado_articulo smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.articulo;
       public         heap    postgres    false            �            1259    74571    Articulo_id_articulo_seq    SEQUENCE     �   CREATE SEQUENCE public."Articulo_id_articulo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."Articulo_id_articulo_seq";
       public          postgres    false    216            �           0    0    Articulo_id_articulo_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public."Articulo_id_articulo_seq" OWNED BY public.articulo.id_articulo;
          public          postgres    false    217            �            1259    74572 	   categoria    TABLE     �   CREATE TABLE public.categoria (
    id_categoria integer NOT NULL,
    nombre_categoria character varying(25) NOT NULL,
    estado_categoria smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.categoria;
       public         heap    postgres    false            �            1259    74576    Categoria_id_categoria_seq    SEQUENCE     �   CREATE SEQUENCE public."Categoria_id_categoria_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."Categoria_id_categoria_seq";
       public          postgres    false    218            �           0    0    Categoria_id_categoria_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public."Categoria_id_categoria_seq" OWNED BY public.categoria.id_categoria;
          public          postgres    false    219            �            1259    74790    detalle_almacen    TABLE     �   CREATE TABLE public.detalle_almacen (
    id_detalle integer NOT NULL,
    id_almacen integer DEFAULT 1,
    id_articulo integer,
    cantidad integer,
    estado_detalle smallint DEFAULT '1'::smallint
);
 #   DROP TABLE public.detalle_almacen;
       public         heap    postgres    false            �            1259    74789    detalle_almacen_id_detalle_seq    SEQUENCE     �   CREATE SEQUENCE public.detalle_almacen_id_detalle_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.detalle_almacen_id_detalle_seq;
       public          postgres    false    247            �           0    0    detalle_almacen_id_detalle_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.detalle_almacen_id_detalle_seq OWNED BY public.detalle_almacen.id_detalle;
          public          postgres    false    246            �            1259    74577    detalle_ingreso    TABLE     �   CREATE TABLE public.detalle_ingreso (
    id_ingreso integer NOT NULL,
    id_articulo integer NOT NULL,
    cantidad integer NOT NULL
);
 #   DROP TABLE public.detalle_ingreso;
       public         heap    postgres    false            �            1259    74580    detalle_ingreso_id_articulo_seq    SEQUENCE     �   CREATE SEQUENCE public.detalle_ingreso_id_articulo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 6   DROP SEQUENCE public.detalle_ingreso_id_articulo_seq;
       public          postgres    false    220            �           0    0    detalle_ingreso_id_articulo_seq    SEQUENCE OWNED BY     c   ALTER SEQUENCE public.detalle_ingreso_id_articulo_seq OWNED BY public.detalle_ingreso.id_articulo;
          public          postgres    false    221            �            1259    74581    detalle_ingreso_id_ingreso_seq    SEQUENCE     �   CREATE SEQUENCE public.detalle_ingreso_id_ingreso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.detalle_ingreso_id_ingreso_seq;
       public          postgres    false    220            �           0    0    detalle_ingreso_id_ingreso_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.detalle_ingreso_id_ingreso_seq OWNED BY public.detalle_ingreso.id_ingreso;
          public          postgres    false    222            �            1259    74582    detalle_oficina    TABLE     o   CREATE TABLE public.detalle_oficina (
    id_oficina integer,
    id_articulo integer,
    cantidad integer
);
 #   DROP TABLE public.detalle_oficina;
       public         heap    postgres    false            �            1259    74585    detalle_solicitud    TABLE       CREATE TABLE public.detalle_solicitud (
    id_detalle integer NOT NULL,
    id_solicitud integer,
    id_empleado integer,
    id_articulo integer,
    id_proveedor integer,
    id_oficina integer,
    id_almacen integer,
    id_subalmacen integer,
    cantidad_solicitada integer
);
 %   DROP TABLE public.detalle_solicitud;
       public         heap    postgres    false            �            1259    74588     detalle_solicitud_id_detalle_seq    SEQUENCE     �   CREATE SEQUENCE public.detalle_solicitud_id_detalle_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 7   DROP SEQUENCE public.detalle_solicitud_id_detalle_seq;
       public          postgres    false    224            �           0    0     detalle_solicitud_id_detalle_seq    SEQUENCE OWNED BY     e   ALTER SEQUENCE public.detalle_solicitud_id_detalle_seq OWNED BY public.detalle_solicitud.id_detalle;
          public          postgres    false    225            �            1259    74589    detalle_subalmacen    TABLE     �   CREATE TABLE public.detalle_subalmacen (
    id_sub_almacen integer,
    id_articulo integer,
    cantidad integer,
    id_detalle integer NOT NULL,
    estado_detalle smallint DEFAULT 1
);
 &   DROP TABLE public.detalle_subalmacen;
       public         heap    postgres    false            �            1259    74798 !   detalle_subalmacen_id_detalle_seq    SEQUENCE     �   CREATE SEQUENCE public.detalle_subalmacen_id_detalle_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 8   DROP SEQUENCE public.detalle_subalmacen_id_detalle_seq;
       public          postgres    false    226            �           0    0 !   detalle_subalmacen_id_detalle_seq    SEQUENCE OWNED BY     g   ALTER SEQUENCE public.detalle_subalmacen_id_detalle_seq OWNED BY public.detalle_subalmacen.id_detalle;
          public          postgres    false    248            �            1259    74592    empleado    TABLE     �  CREATE TABLE public.empleado (
    id_empleado integer NOT NULL,
    nombre character varying(25) NOT NULL,
    apellido_paterno character varying(25) NOT NULL,
    apellido_materno character varying(25) NOT NULL,
    correo_empleado character varying(50) NOT NULL,
    estado_empleado smallint DEFAULT 1 NOT NULL,
    password character varying(30) NOT NULL,
    id_oficina integer
);
    DROP TABLE public.empleado;
       public         heap    postgres    false            �            1259    74596    empleado_id_empleado_seq    SEQUENCE     �   CREATE SEQUENCE public.empleado_id_empleado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.empleado_id_empleado_seq;
       public          postgres    false    227            �           0    0    empleado_id_empleado_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.empleado_id_empleado_seq OWNED BY public.empleado.id_empleado;
          public          postgres    false    228            �            1259    74597    ingreso    TABLE     �   CREATE TABLE public.ingreso (
    id_ingreso integer NOT NULL,
    id_proveedor integer NOT NULL,
    fecha_ingreso timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.ingreso;
       public         heap    postgres    false            �            1259    74601    ingreso_id_ingreso_seq    SEQUENCE     �   CREATE SEQUENCE public.ingreso_id_ingreso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.ingreso_id_ingreso_seq;
       public          postgres    false    229            �           0    0    ingreso_id_ingreso_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.ingreso_id_ingreso_seq OWNED BY public.ingreso.id_ingreso;
          public          postgres    false    230            �            1259    74602    oficina    TABLE     9  CREATE TABLE public.oficina (
    id_oficina integer NOT NULL,
    nombre_oficina character varying(50) NOT NULL,
    descripcion_oficina character varying(60) NOT NULL,
    ubicacion_oficina character varying(40) NOT NULL,
    telefono_oficina integer NOT NULL,
    estado_oficina smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.oficina;
       public         heap    postgres    false            �            1259    74606    oficina_id_oficina_seq    SEQUENCE     �   CREATE SEQUENCE public.oficina_id_oficina_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.oficina_id_oficina_seq;
       public          postgres    false    231            �           0    0    oficina_id_oficina_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.oficina_id_oficina_seq OWNED BY public.oficina.id_oficina;
          public          postgres    false    232            �            1259    74607 	   proveedor    TABLE     :  CREATE TABLE public.proveedor (
    id_proveedor integer NOT NULL,
    nombre_proveedor character varying(30) NOT NULL,
    direccion_proveedor character varying(60) NOT NULL,
    correo_proveedor character varying(50) NOT NULL,
    id_almacen integer NOT NULL,
    estado_proveedor smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.proveedor;
       public         heap    postgres    false            �            1259    74611    proveedor_id_proveedor_seq    SEQUENCE     �   CREATE SEQUENCE public.proveedor_id_proveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.proveedor_id_proveedor_seq;
       public          postgres    false    233            �           0    0    proveedor_id_proveedor_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.proveedor_id_proveedor_seq OWNED BY public.proveedor.id_proveedor;
          public          postgres    false    234            �            1259    74612 	   solicitud    TABLE     �   CREATE TABLE public.solicitud (
    id_solicitud integer NOT NULL,
    fecha_solicitud timestamp with time zone DEFAULT CURRENT_TIMESTAMP NOT NULL,
    estado_solicitud smallint DEFAULT 1 NOT NULL,
    id_vehiculo integer NOT NULL
);
    DROP TABLE public.solicitud;
       public         heap    postgres    false            �            1259    74617    solicitud_id_vehiculo_seq    SEQUENCE     �   CREATE SEQUENCE public.solicitud_id_vehiculo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.solicitud_id_vehiculo_seq;
       public          postgres    false    235            �           0    0    solicitud_id_vehiculo_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public.solicitud_id_vehiculo_seq OWNED BY public.solicitud.id_vehiculo;
          public          postgres    false    236            �            1259    74618    solicitud_idsolicitud_seq    SEQUENCE     �   CREATE SEQUENCE public.solicitud_idsolicitud_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 0   DROP SEQUENCE public.solicitud_idsolicitud_seq;
       public          postgres    false    235            �           0    0    solicitud_idsolicitud_seq    SEQUENCE OWNED BY     X   ALTER SEQUENCE public.solicitud_idsolicitud_seq OWNED BY public.solicitud.id_solicitud;
          public          postgres    false    237            �            1259    74619    sub_almacen    TABLE     �   CREATE TABLE public.sub_almacen (
    id_sub_almacen integer NOT NULL,
    direccion_sub_almacen character varying(150),
    capacidad_sub_almacen integer,
    id_oficina integer,
    estado_sub_almacen integer DEFAULT 1
);
    DROP TABLE public.sub_almacen;
       public         heap    postgres    false            �            1259    74623    sub_almacen_id_sub_almacen_seq    SEQUENCE     �   CREATE SEQUENCE public.sub_almacen_id_sub_almacen_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.sub_almacen_id_sub_almacen_seq;
       public          postgres    false    238            �           0    0    sub_almacen_id_sub_almacen_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.sub_almacen_id_sub_almacen_seq OWNED BY public.sub_almacen.id_sub_almacen;
          public          postgres    false    239            �            1259    74624    surtidor    TABLE     �   CREATE TABLE public.surtidor (
    id_surtidor integer NOT NULL,
    ubicacion_surtidor character varying(150) NOT NULL,
    telefono_surtidor character varying(150) NOT NULL,
    estado_surtidor smallint DEFAULT '1'::smallint NOT NULL
);
    DROP TABLE public.surtidor;
       public         heap    postgres    false            �            1259    74628    surtidor_id_surtidor_seq    SEQUENCE     �   CREATE SEQUENCE public.surtidor_id_surtidor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.surtidor_id_surtidor_seq;
       public          postgres    false    240            �           0    0    surtidor_id_surtidor_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.surtidor_id_surtidor_seq OWNED BY public.surtidor.id_surtidor;
          public          postgres    false    241            �            1259    74629    vehiculo    TABLE     �   CREATE TABLE public.vehiculo (
    id_vehiculo integer NOT NULL,
    tipo_vehiculo character varying(150) NOT NULL,
    placa_vehiculo character varying(150) NOT NULL,
    estado_vehiculo smallint DEFAULT '1'::smallint NOT NULL
);
    DROP TABLE public.vehiculo;
       public         heap    postgres    false            �            1259    74633    vehiculo_id_vehiculo_seq    SEQUENCE     �   CREATE SEQUENCE public.vehiculo_id_vehiculo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.vehiculo_id_vehiculo_seq;
       public          postgres    false    242            �           0    0    vehiculo_id_vehiculo_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.vehiculo_id_vehiculo_seq OWNED BY public.vehiculo.id_vehiculo;
          public          postgres    false    243            �            1259    74634    vehiculo_surtidor    TABLE     �   CREATE TABLE public.vehiculo_surtidor (
    id_vehiculo integer,
    id_surtidor integer,
    fecha_limite date,
    id_vs integer NOT NULL
);
 %   DROP TABLE public.vehiculo_surtidor;
       public         heap    postgres    false            �            1259    74637    vehiculo_surtidor_id_vs_seq    SEQUENCE     �   CREATE SEQUENCE public.vehiculo_surtidor_id_vs_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.vehiculo_surtidor_id_vs_seq;
       public          postgres    false    244            �           0    0    vehiculo_surtidor_id_vs_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.vehiculo_surtidor_id_vs_seq OWNED BY public.vehiculo_surtidor.id_vs;
          public          postgres    false    245            �           2604    74638    almacen id_almacen    DEFAULT     z   ALTER TABLE ONLY public.almacen ALTER COLUMN id_almacen SET DEFAULT nextval('public."Almacen_id_almacen_seq"'::regclass);
 A   ALTER TABLE public.almacen ALTER COLUMN id_almacen DROP DEFAULT;
       public          postgres    false    215    214            �           2604    74639    articulo id_articulo    DEFAULT     ~   ALTER TABLE ONLY public.articulo ALTER COLUMN id_articulo SET DEFAULT nextval('public."Articulo_id_articulo_seq"'::regclass);
 C   ALTER TABLE public.articulo ALTER COLUMN id_articulo DROP DEFAULT;
       public          postgres    false    217    216            �           2604    74640    categoria id_categoria    DEFAULT     �   ALTER TABLE ONLY public.categoria ALTER COLUMN id_categoria SET DEFAULT nextval('public."Categoria_id_categoria_seq"'::regclass);
 E   ALTER TABLE public.categoria ALTER COLUMN id_categoria DROP DEFAULT;
       public          postgres    false    219    218            �           2604    74793    detalle_almacen id_detalle    DEFAULT     �   ALTER TABLE ONLY public.detalle_almacen ALTER COLUMN id_detalle SET DEFAULT nextval('public.detalle_almacen_id_detalle_seq'::regclass);
 I   ALTER TABLE public.detalle_almacen ALTER COLUMN id_detalle DROP DEFAULT;
       public          postgres    false    247    246    247            �           2604    74641    detalle_ingreso id_ingreso    DEFAULT     �   ALTER TABLE ONLY public.detalle_ingreso ALTER COLUMN id_ingreso SET DEFAULT nextval('public.detalle_ingreso_id_ingreso_seq'::regclass);
 I   ALTER TABLE public.detalle_ingreso ALTER COLUMN id_ingreso DROP DEFAULT;
       public          postgres    false    222    220            �           2604    74642    detalle_ingreso id_articulo    DEFAULT     �   ALTER TABLE ONLY public.detalle_ingreso ALTER COLUMN id_articulo SET DEFAULT nextval('public.detalle_ingreso_id_articulo_seq'::regclass);
 J   ALTER TABLE public.detalle_ingreso ALTER COLUMN id_articulo DROP DEFAULT;
       public          postgres    false    221    220            �           2604    74643    detalle_solicitud id_detalle    DEFAULT     �   ALTER TABLE ONLY public.detalle_solicitud ALTER COLUMN id_detalle SET DEFAULT nextval('public.detalle_solicitud_id_detalle_seq'::regclass);
 K   ALTER TABLE public.detalle_solicitud ALTER COLUMN id_detalle DROP DEFAULT;
       public          postgres    false    225    224            �           2604    74799    detalle_subalmacen id_detalle    DEFAULT     �   ALTER TABLE ONLY public.detalle_subalmacen ALTER COLUMN id_detalle SET DEFAULT nextval('public.detalle_subalmacen_id_detalle_seq'::regclass);
 L   ALTER TABLE public.detalle_subalmacen ALTER COLUMN id_detalle DROP DEFAULT;
       public          postgres    false    248    226            �           2604    74644    empleado id_empleado    DEFAULT     |   ALTER TABLE ONLY public.empleado ALTER COLUMN id_empleado SET DEFAULT nextval('public.empleado_id_empleado_seq'::regclass);
 C   ALTER TABLE public.empleado ALTER COLUMN id_empleado DROP DEFAULT;
       public          postgres    false    228    227            �           2604    74645    ingreso id_ingreso    DEFAULT     x   ALTER TABLE ONLY public.ingreso ALTER COLUMN id_ingreso SET DEFAULT nextval('public.ingreso_id_ingreso_seq'::regclass);
 A   ALTER TABLE public.ingreso ALTER COLUMN id_ingreso DROP DEFAULT;
       public          postgres    false    230    229            �           2604    74646    oficina id_oficina    DEFAULT     x   ALTER TABLE ONLY public.oficina ALTER COLUMN id_oficina SET DEFAULT nextval('public.oficina_id_oficina_seq'::regclass);
 A   ALTER TABLE public.oficina ALTER COLUMN id_oficina DROP DEFAULT;
       public          postgres    false    232    231            �           2604    74647    proveedor id_proveedor    DEFAULT     �   ALTER TABLE ONLY public.proveedor ALTER COLUMN id_proveedor SET DEFAULT nextval('public.proveedor_id_proveedor_seq'::regclass);
 E   ALTER TABLE public.proveedor ALTER COLUMN id_proveedor DROP DEFAULT;
       public          postgres    false    234    233            �           2604    74648    solicitud id_solicitud    DEFAULT        ALTER TABLE ONLY public.solicitud ALTER COLUMN id_solicitud SET DEFAULT nextval('public.solicitud_idsolicitud_seq'::regclass);
 E   ALTER TABLE public.solicitud ALTER COLUMN id_solicitud DROP DEFAULT;
       public          postgres    false    237    235            �           2604    74649    solicitud id_vehiculo    DEFAULT     ~   ALTER TABLE ONLY public.solicitud ALTER COLUMN id_vehiculo SET DEFAULT nextval('public.solicitud_id_vehiculo_seq'::regclass);
 D   ALTER TABLE public.solicitud ALTER COLUMN id_vehiculo DROP DEFAULT;
       public          postgres    false    236    235            �           2604    74650    sub_almacen id_sub_almacen    DEFAULT     �   ALTER TABLE ONLY public.sub_almacen ALTER COLUMN id_sub_almacen SET DEFAULT nextval('public.sub_almacen_id_sub_almacen_seq'::regclass);
 I   ALTER TABLE public.sub_almacen ALTER COLUMN id_sub_almacen DROP DEFAULT;
       public          postgres    false    239    238            �           2604    74651    surtidor id_surtidor    DEFAULT     |   ALTER TABLE ONLY public.surtidor ALTER COLUMN id_surtidor SET DEFAULT nextval('public.surtidor_id_surtidor_seq'::regclass);
 C   ALTER TABLE public.surtidor ALTER COLUMN id_surtidor DROP DEFAULT;
       public          postgres    false    241    240            �           2604    74652    vehiculo id_vehiculo    DEFAULT     |   ALTER TABLE ONLY public.vehiculo ALTER COLUMN id_vehiculo SET DEFAULT nextval('public.vehiculo_id_vehiculo_seq'::regclass);
 C   ALTER TABLE public.vehiculo ALTER COLUMN id_vehiculo DROP DEFAULT;
       public          postgres    false    243    242            �           2604    74653    vehiculo_surtidor id_vs    DEFAULT     �   ALTER TABLE ONLY public.vehiculo_surtidor ALTER COLUMN id_vs SET DEFAULT nextval('public.vehiculo_surtidor_id_vs_seq'::regclass);
 F   ALTER TABLE public.vehiculo_surtidor ALTER COLUMN id_vs DROP DEFAULT;
       public          postgres    false    245    244            �          0    74561    almacen 
   TABLE DATA           b   COPY public.almacen (id_almacen, direccion_almacen, telefono, responsable, capacidad) FROM stdin;
    public          postgres    false    214   ��       �          0    74565    articulo 
   TABLE DATA           �   COPY public.articulo (id_articulo, nombre_articulo, descripcion_articulo, precio_unitario, id_categoria, id_almacen, estado_articulo) FROM stdin;
    public          postgres    false    216   �       �          0    74572 	   categoria 
   TABLE DATA           U   COPY public.categoria (id_categoria, nombre_categoria, estado_categoria) FROM stdin;
    public          postgres    false    218   >�       �          0    74790    detalle_almacen 
   TABLE DATA           h   COPY public.detalle_almacen (id_detalle, id_almacen, id_articulo, cantidad, estado_detalle) FROM stdin;
    public          postgres    false    247   ��       �          0    74577    detalle_ingreso 
   TABLE DATA           L   COPY public.detalle_ingreso (id_ingreso, id_articulo, cantidad) FROM stdin;
    public          postgres    false    220   ��       �          0    74582    detalle_oficina 
   TABLE DATA           L   COPY public.detalle_oficina (id_oficina, id_articulo, cantidad) FROM stdin;
    public          postgres    false    223   ٶ       �          0    74585    detalle_solicitud 
   TABLE DATA           �   COPY public.detalle_solicitud (id_detalle, id_solicitud, id_empleado, id_articulo, id_proveedor, id_oficina, id_almacen, id_subalmacen, cantidad_solicitada) FROM stdin;
    public          postgres    false    224   $�       �          0    74589    detalle_subalmacen 
   TABLE DATA           o   COPY public.detalle_subalmacen (id_sub_almacen, id_articulo, cantidad, id_detalle, estado_detalle) FROM stdin;
    public          postgres    false    226   g�       �          0    74592    empleado 
   TABLE DATA           �   COPY public.empleado (id_empleado, nombre, apellido_paterno, apellido_materno, correo_empleado, estado_empleado, password, id_oficina) FROM stdin;
    public          postgres    false    227   �       �          0    74597    ingreso 
   TABLE DATA           J   COPY public.ingreso (id_ingreso, id_proveedor, fecha_ingreso) FROM stdin;
    public          postgres    false    229   �       �          0    74602    oficina 
   TABLE DATA           �   COPY public.oficina (id_oficina, nombre_oficina, descripcion_oficina, ubicacion_oficina, telefono_oficina, estado_oficina) FROM stdin;
    public          postgres    false    231   ^�       �          0    74607 	   proveedor 
   TABLE DATA           �   COPY public.proveedor (id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen, estado_proveedor) FROM stdin;
    public          postgres    false    233   ��       �          0    74612 	   solicitud 
   TABLE DATA           a   COPY public.solicitud (id_solicitud, fecha_solicitud, estado_solicitud, id_vehiculo) FROM stdin;
    public          postgres    false    235   ��       �          0    74619    sub_almacen 
   TABLE DATA           �   COPY public.sub_almacen (id_sub_almacen, direccion_sub_almacen, capacidad_sub_almacen, id_oficina, estado_sub_almacen) FROM stdin;
    public          postgres    false    238   ��       �          0    74624    surtidor 
   TABLE DATA           g   COPY public.surtidor (id_surtidor, ubicacion_surtidor, telefono_surtidor, estado_surtidor) FROM stdin;
    public          postgres    false    240   I�       �          0    74629    vehiculo 
   TABLE DATA           _   COPY public.vehiculo (id_vehiculo, tipo_vehiculo, placa_vehiculo, estado_vehiculo) FROM stdin;
    public          postgres    false    242   ��       �          0    74634    vehiculo_surtidor 
   TABLE DATA           Z   COPY public.vehiculo_surtidor (id_vehiculo, id_surtidor, fecha_limite, id_vs) FROM stdin;
    public          postgres    false    244   P�       �           0    0    Almacen_id_almacen_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public."Almacen_id_almacen_seq"', 1, true);
          public          postgres    false    215            �           0    0    Articulo_id_articulo_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."Articulo_id_articulo_seq"', 13, true);
          public          postgres    false    217            �           0    0    Categoria_id_categoria_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public."Categoria_id_categoria_seq"', 3, true);
          public          postgres    false    219            �           0    0    detalle_almacen_id_detalle_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.detalle_almacen_id_detalle_seq', 2, true);
          public          postgres    false    246            �           0    0    detalle_ingreso_id_articulo_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.detalle_ingreso_id_articulo_seq', 1, false);
          public          postgres    false    221            �           0    0    detalle_ingreso_id_ingreso_seq    SEQUENCE SET     M   SELECT pg_catalog.setval('public.detalle_ingreso_id_ingreso_seq', 1, false);
          public          postgres    false    222            �           0    0     detalle_solicitud_id_detalle_seq    SEQUENCE SET     N   SELECT pg_catalog.setval('public.detalle_solicitud_id_detalle_seq', 8, true);
          public          postgres    false    225            �           0    0 !   detalle_subalmacen_id_detalle_seq    SEQUENCE SET     P   SELECT pg_catalog.setval('public.detalle_subalmacen_id_detalle_seq', 20, true);
          public          postgres    false    248            �           0    0    empleado_id_empleado_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.empleado_id_empleado_seq', 83, true);
          public          postgres    false    228            �           0    0    ingreso_id_ingreso_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.ingreso_id_ingreso_seq', 2, true);
          public          postgres    false    230            �           0    0    oficina_id_oficina_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.oficina_id_oficina_seq', 2, true);
          public          postgres    false    232            �           0    0    proveedor_id_proveedor_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.proveedor_id_proveedor_seq', 4, true);
          public          postgres    false    234            �           0    0    solicitud_id_vehiculo_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.solicitud_id_vehiculo_seq', 1, false);
          public          postgres    false    236            �           0    0    solicitud_idsolicitud_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.solicitud_idsolicitud_seq', 3, true);
          public          postgres    false    237            �           0    0    sub_almacen_id_sub_almacen_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.sub_almacen_id_sub_almacen_seq', 3, true);
          public          postgres    false    239            �           0    0    surtidor_id_surtidor_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.surtidor_id_surtidor_seq', 6, true);
          public          postgres    false    241            �           0    0    vehiculo_id_vehiculo_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.vehiculo_id_vehiculo_seq', 34, true);
          public          postgres    false    243            �           0    0    vehiculo_surtidor_id_vs_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.vehiculo_surtidor_id_vs_seq', 6, true);
          public          postgres    false    245            �           2606    74655    almacen Almacen_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.almacen
    ADD CONSTRAINT "Almacen_pkey" PRIMARY KEY (id_almacen);
 @   ALTER TABLE ONLY public.almacen DROP CONSTRAINT "Almacen_pkey";
       public            postgres    false    214            �           2606    74657    articulo Articulo_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT "Articulo_pkey" PRIMARY KEY (id_articulo);
 B   ALTER TABLE ONLY public.articulo DROP CONSTRAINT "Articulo_pkey";
       public            postgres    false    216            �           2606    74659    categoria Categoria_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT "Categoria_pkey" PRIMARY KEY (id_categoria);
 D   ALTER TABLE ONLY public.categoria DROP CONSTRAINT "Categoria_pkey";
       public            postgres    false    218            �           2606    74796 $   detalle_almacen detalle_almacen_pkey 
   CONSTRAINT     j   ALTER TABLE ONLY public.detalle_almacen
    ADD CONSTRAINT detalle_almacen_pkey PRIMARY KEY (id_detalle);
 N   ALTER TABLE ONLY public.detalle_almacen DROP CONSTRAINT detalle_almacen_pkey;
       public            postgres    false    247            �           2606    74661    empleado empleado_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (id_empleado);
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_pkey;
       public            postgres    false    227            �           2606    74663    ingreso ingreso_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.ingreso
    ADD CONSTRAINT ingreso_pkey PRIMARY KEY (id_ingreso);
 >   ALTER TABLE ONLY public.ingreso DROP CONSTRAINT ingreso_pkey;
       public            postgres    false    229            �           2606    74665    oficina oficina_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.oficina
    ADD CONSTRAINT oficina_pkey PRIMARY KEY (id_oficina);
 >   ALTER TABLE ONLY public.oficina DROP CONSTRAINT oficina_pkey;
       public            postgres    false    231            �           2606    74667    proveedor proveedor_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (id_proveedor);
 B   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_pkey;
       public            postgres    false    233            �           2606    74669    solicitud solicitud_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT solicitud_pkey PRIMARY KEY (id_solicitud);
 B   ALTER TABLE ONLY public.solicitud DROP CONSTRAINT solicitud_pkey;
       public            postgres    false    235            �           2606    74671    sub_almacen sub_almacen_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.sub_almacen
    ADD CONSTRAINT sub_almacen_pkey PRIMARY KEY (id_sub_almacen);
 F   ALTER TABLE ONLY public.sub_almacen DROP CONSTRAINT sub_almacen_pkey;
       public            postgres    false    238            �           2606    74673    surtidor surtidor_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.surtidor
    ADD CONSTRAINT surtidor_pkey PRIMARY KEY (id_surtidor);
 @   ALTER TABLE ONLY public.surtidor DROP CONSTRAINT surtidor_pkey;
       public            postgres    false    240            �           2606    74675    vehiculo vehiculo_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.vehiculo
    ADD CONSTRAINT vehiculo_pkey PRIMARY KEY (id_vehiculo);
 @   ALTER TABLE ONLY public.vehiculo DROP CONSTRAINT vehiculo_pkey;
       public            postgres    false    242            �           2606    74677 (   vehiculo_surtidor vehiculo_surtidor_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT vehiculo_surtidor_pkey PRIMARY KEY (id_vs);
 R   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT vehiculo_surtidor_pkey;
       public            postgres    false    244            �           2606    74678    articulo fk_almacen    FK CONSTRAINT        ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 =   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_almacen;
       public          postgres    false    216    214    3287                       2606    74683    proveedor fk_almacen    FK CONSTRAINT     �   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 >   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT fk_almacen;
       public          postgres    false    214    3287    233            �           2606    74688    detalle_solicitud fk_almacen    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_solicitud
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 F   ALTER TABLE ONLY public.detalle_solicitud DROP CONSTRAINT fk_almacen;
       public          postgres    false    3287    224    214            �           2606    74693    detalle_ingreso fk_articulo    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_ingreso
    ADD CONSTRAINT fk_articulo FOREIGN KEY (id_articulo) REFERENCES public.articulo(id_articulo);
 E   ALTER TABLE ONLY public.detalle_ingreso DROP CONSTRAINT fk_articulo;
       public          postgres    false    3289    216    220            �           2606    74698    detalle_oficina fk_articulo    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_oficina
    ADD CONSTRAINT fk_articulo FOREIGN KEY (id_articulo) REFERENCES public.articulo(id_articulo);
 E   ALTER TABLE ONLY public.detalle_oficina DROP CONSTRAINT fk_articulo;
       public          postgres    false    223    216    3289            �           2606    74703    detalle_solicitud fk_articulo    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_solicitud
    ADD CONSTRAINT fk_articulo FOREIGN KEY (id_articulo) REFERENCES public.articulo(id_articulo);
 G   ALTER TABLE ONLY public.detalle_solicitud DROP CONSTRAINT fk_articulo;
       public          postgres    false    224    3289    216            �           2606    74708    detalle_subalmacen fk_articulo    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_subalmacen
    ADD CONSTRAINT fk_articulo FOREIGN KEY (id_articulo) REFERENCES public.articulo(id_articulo);
 H   ALTER TABLE ONLY public.detalle_subalmacen DROP CONSTRAINT fk_articulo;
       public          postgres    false    226    216    3289            �           2606    74713    articulo fk_categoria    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES public.categoria(id_categoria);
 ?   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_categoria;
       public          postgres    false    3291    216    218            �           2606    74718    detalle_solicitud fk_empleado    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_solicitud
    ADD CONSTRAINT fk_empleado FOREIGN KEY (id_empleado) REFERENCES public.empleado(id_empleado);
 G   ALTER TABLE ONLY public.detalle_solicitud DROP CONSTRAINT fk_empleado;
       public          postgres    false    3293    227    224            �           2606    74723    detalle_ingreso fk_ingreso    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_ingreso
    ADD CONSTRAINT fk_ingreso FOREIGN KEY (id_ingreso) REFERENCES public.ingreso(id_ingreso);
 D   ALTER TABLE ONLY public.detalle_ingreso DROP CONSTRAINT fk_ingreso;
       public          postgres    false    229    220    3295            �           2606    74728    empleado fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina) NOT VALID;
 =   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fk_oficina;
       public          postgres    false    3297    227    231                       2606    74733    sub_almacen fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.sub_almacen
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina);
 @   ALTER TABLE ONLY public.sub_almacen DROP CONSTRAINT fk_oficina;
       public          postgres    false    231    238    3297            �           2606    74738    detalle_oficina fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_oficina
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina);
 D   ALTER TABLE ONLY public.detalle_oficina DROP CONSTRAINT fk_oficina;
       public          postgres    false    3297    223    231            �           2606    74743    detalle_solicitud fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_solicitud
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina);
 F   ALTER TABLE ONLY public.detalle_solicitud DROP CONSTRAINT fk_oficina;
       public          postgres    false    224    3297    231                        2606    74748    ingreso fk_proveedor    FK CONSTRAINT     �   ALTER TABLE ONLY public.ingreso
    ADD CONSTRAINT fk_proveedor FOREIGN KEY (id_proveedor) REFERENCES public.proveedor(id_proveedor);
 >   ALTER TABLE ONLY public.ingreso DROP CONSTRAINT fk_proveedor;
       public          postgres    false    3299    229    233            �           2606    74753    detalle_solicitud fk_proveedor    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_solicitud
    ADD CONSTRAINT fk_proveedor FOREIGN KEY (id_proveedor) REFERENCES public.proveedor(id_proveedor);
 H   ALTER TABLE ONLY public.detalle_solicitud DROP CONSTRAINT fk_proveedor;
       public          postgres    false    224    233    3299            �           2606    74758    detalle_solicitud fk_solicitud    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_solicitud
    ADD CONSTRAINT fk_solicitud FOREIGN KEY (id_solicitud) REFERENCES public.solicitud(id_solicitud);
 H   ALTER TABLE ONLY public.detalle_solicitud DROP CONSTRAINT fk_solicitud;
       public          postgres    false    224    3301    235            �           2606    74763    detalle_solicitud fk_subalmacen    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_solicitud
    ADD CONSTRAINT fk_subalmacen FOREIGN KEY (id_subalmacen) REFERENCES public.sub_almacen(id_sub_almacen);
 I   ALTER TABLE ONLY public.detalle_solicitud DROP CONSTRAINT fk_subalmacen;
       public          postgres    false    3303    238    224            �           2606    74768     detalle_subalmacen fk_subalmacen    FK CONSTRAINT     �   ALTER TABLE ONLY public.detalle_subalmacen
    ADD CONSTRAINT fk_subalmacen FOREIGN KEY (id_sub_almacen) REFERENCES public.sub_almacen(id_sub_almacen);
 J   ALTER TABLE ONLY public.detalle_subalmacen DROP CONSTRAINT fk_subalmacen;
       public          postgres    false    3303    226    238                       2606    74773    vehiculo_surtidor fk_surtidor    FK CONSTRAINT     �   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT fk_surtidor FOREIGN KEY (id_surtidor) REFERENCES public.surtidor(id_surtidor);
 G   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT fk_surtidor;
       public          postgres    false    244    3305    240                       2606    74778    vehiculo_surtidor fk_vehiculo    FK CONSTRAINT     �   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT fk_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES public.vehiculo(id_vehiculo);
 G   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT fk_vehiculo;
       public          postgres    false    244    3307    242                       2606    74783    solicitud fk_vehiculo    FK CONSTRAINT     �   ALTER TABLE ONLY public.solicitud
    ADD CONSTRAINT fk_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES public.vehiculo(id_vehiculo) NOT VALID;
 ?   ALTER TABLE ONLY public.solicitud DROP CONSTRAINT fk_vehiculo;
       public          postgres    false    235    3307    242            �   B   x�3�tN��IUp����SH�+)JU��KO,�T�TH���,K,�4426153�����410������ #�j      �   I  x�]QIr� <�^�R�%g�&����F.�`���7�cIH�%
=�t�+L|� ���*t��3,	�b�@�0r�CmY��=*�@�FpT8Bw�Դ�B,�oI�,�|������l�̟�(�Q�Zb)fή_��\��EJ8�W�d#ml���I	���e2ݡ�w��xO&w�J7y/��(��MA_<�HKgϼ�g��<_@ͥ�N�,������(���(}r��'�o=3W�)�	i��!�5ʪJ��(Σٮ�Q�<��=�V�������B�N��6��+f�:��!ǲ�� ��s�G{ڍ��	Mɲ�U��罹i� l�ǃ      �   6   x�3��M,JNL�/J-�4�2����J,VHIU(H,H�
q�$d&��c���� ��X      �   !   x�3�4��45�4�22M9-͌��=... 5��      �      x�3�4�46����� �      �   ;   x����0�K1N8s1�b�u�����*�}p�,f�ˎo�ܧ�g�;���.I?B2�      �   3   x�3�4�4�4��2���)�	X�I�ؔ˜ӈ��]�DMm� �_      �   r   x�EN��0{�bv,_���:�8�0B�`�/4��&�P?x�DK��U#������H��3�`׵<0l�}��O���!;�䗲�+���}'&�y~�:�-�v����=      �     x��W�v������,+��̄�<�BrȺٖmaYr$b��n���Lz�IT�R�]�����qM_u$�c��cè���_�0+���.)���
���hzP�O��f��J����Vh�	���k��!���J��F�P\i�,}p��w͏����ޯ1�r�}���/Ġm}g��S��Q	�u%���+��?�a��4W�P�5�����Kq��CZ0Jѻ.�EM	3��g!Y�8�T��N���f��6���Rp����d�8*X�8'���^X���'�w�����~��,b-�b�ٜ�$����[�	�|��~hc#�����Rǽ����L�T�ITW��RgF�9e�����a����l�w�=�[f�B�R+��6NqIYr�a���juE��)ƗK?��yc�����C��w�2�(6gaF5ŭ=��z{���u���nk��F>P_f�B�ڠ�"�̝�q�D��o�7��$H`Уg̿�=4�������}���<�� 	���)i���>�>�"n�*x��P���4d�s~�Mm���2�/���4�E\�}W��Z�,�9������E���{ԣ�c��+���|��R��5r.�%���(��9'� g[�焏�7��K|#�ק��\��˄��O�$�g!�:i#��wk�K��`L7.�Q4gu�;NלH߇�7	KVy(���n��Ik������i���2��2��T�q��<��1�E���������70��a*.��U�䬤[_@�J�VJC�ڡ�B����ի&�^�(��+�I��`�3d�JY�x�+m�m��_Cg�D��=1L�:�(�Zh�K�`O�tb�BD\0�x+���f7��)��]��ڠ��Tg�ډN��$n�,���q�x�>]5`'���'�d�y�Qth��#�(_������^q�y_�f�1g ��6���Jy����>f���ؖ�[;�Uҽʌ(�6@��ת��pgA��>b�;�Po�t�}k��|D��r���L8�q�ܑ�����GJ'��?\nf���m8�k�,�\���/���50�U�u,���n��V^iB_�?fL++��۬�X?F��C�f�Ÿv����f󃭂��~�n,�D�{��J,�ԑu|�B+/��5T��D�5�y��!	|��EF�䡕�C �.�d^~[����������1=*�����~�:&T�u�c���RHc�#l��ނj��{�q^����N��䂊K����/͜_W�{pi@V`��;'PQ"_G2k%V�#�yr����<�n�70�V�����5��u��;��:l@<��{қ�-@�5}��ظZ�6�a1���PZ��}(<�ia[�o�����hD�[X��p�� �#��N<�(����-���o�јf%��KQZLޚaZb�������_�n�L٠���ԃ4�;}@���T9�%3G4LS^�R�ٟ�v�y��~z�Sz�1 Xw780֜%��mO�1��s���G,���ПF���N`�И���d�J�>��e�xχ�e���������8 I�h�1.�񀳞���ajp%)�ݱg5;�VKv�����@w'Π�%�/�fmŠ�e����n-�颊��>�>�>�46Ή6����5v�,ׂ
vp���_�F%F��oW2�|Y<3.�H���;�� �����u�g�c���8�V�%���T�h�T�V
�a*��:��.�F/����#|��o��DW�cIF�YFa��ID�KZ�ﾧϵ��,�'$s�n�[ybe�!�ʳ�C_ǳ��`���پ�`�f���4f�D�nX,��L)��ು��¼%�ثO=��5�v�=��<��,��	�Ԧ��pU/?go�p���>�z�� ��r���Y�O�'9`���	0ߒ��Jo%�w�������6������~ܼaȠ�i4�A�����?z<s� #���+���=���y�����������~�	X�Xt�_�� ��_���(ާ[�ڍ��%�_��������s�      �   9   x�e�Q�0��F֗%-�i��~o�Q��u��ެ\п����'|���      �   |   x�}�K
�0D��)t�Ҙ��]��[
�9~�M7��潙�l��ðr�J�rr��rU���69Н<�9��',)��X���w��F�a�f��3x?�R�遟��?o�KJ��v=�      �   �   x�u�1
1E��)�Q�b-����� �$#�h��7�`�V����<��"*_���B	<���p{qF0�Y�D��f��ɻ�I(��OZkT?M�"Am��EV`,��{�5L�?'?��+���ㄲ&ޑ5H���68�>~'G�      �   H   x�e��� C�s2���t�9Ε���2����-���lU+�Jϋء��:�&r?=���y��g�      �   `   x��=� @Ṝ�'0�,�ť�&�`A~=������t��г�J	��V0j�F�	I�C0�6��׈��3���)�7�d,9T���u���R��+�      �   �   x��;�0��S��w(i��E��Y%&��D���4���Gx���95]�·ц\Ĭ�o��[����	�+����G�
��%ܴ��V��8��әw�&�9S;Ҏ��2��&�������&t�������'�      �   _   x�36�LN����K-I�46*JKO,�4�24�,KL�����Ō�ČM���=\��F�H������	��rpBE9�]L@���qqq �("�      �   A   x�M˱� �X�����������fO��gsB����2�T��rLr�(20�]$��     