PGDMP     1    &                 {            db    15.2    15.2 Q    c           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            d           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            e           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            f           1262    58094    db    DATABASE     v   CREATE DATABASE db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE_PROVIDER = libc LOCALE = 'Spanish_Mexico.1252';
    DROP DATABASE db;
                postgres    false            �            1259    58095    almacen    TABLE     �   CREATE TABLE public.almacen (
    id_almacen integer NOT NULL,
    direccion_almacen character varying(70) NOT NULL,
    telefono character varying(10) NOT NULL,
    responsable character varying(25),
    capacidad integer NOT NULL
);
    DROP TABLE public.almacen;
       public         heap    postgres    false            �            1259    58098    Almacen_id_almacen_seq    SEQUENCE     �   CREATE SEQUENCE public."Almacen_id_almacen_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public."Almacen_id_almacen_seq";
       public          postgres    false    214            g           0    0    Almacen_id_almacen_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public."Almacen_id_almacen_seq" OWNED BY public.almacen.id_almacen;
          public          postgres    false    215            �            1259    58099    articulo    TABLE     K  CREATE TABLE public.articulo (
    id_articulo integer NOT NULL,
    nombre_articulo character varying(30) NOT NULL,
    descripcion_articulo character varying(60) NOT NULL,
    precio_unitario numeric NOT NULL,
    id_categoria integer NOT NULL,
    id_almacen integer NOT NULL,
    estado_articulo smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.articulo;
       public         heap    postgres    false            �            1259    58105    Articulo_id_articulo_seq    SEQUENCE     �   CREATE SEQUENCE public."Articulo_id_articulo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."Articulo_id_articulo_seq";
       public          postgres    false    216            h           0    0    Articulo_id_articulo_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public."Articulo_id_articulo_seq" OWNED BY public.articulo.id_articulo;
          public          postgres    false    217            �            1259    58106 	   categoria    TABLE     �   CREATE TABLE public.categoria (
    id_categoria integer NOT NULL,
    nombre_categoria character varying(25) NOT NULL,
    estado_categoria smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.categoria;
       public         heap    postgres    false            �            1259    58110    Categoria_id_categoria_seq    SEQUENCE     �   CREATE SEQUENCE public."Categoria_id_categoria_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."Categoria_id_categoria_seq";
       public          postgres    false    218            i           0    0    Categoria_id_categoria_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public."Categoria_id_categoria_seq" OWNED BY public.categoria.id_categoria;
          public          postgres    false    219            �            1259    58111    empleado    TABLE     �  CREATE TABLE public.empleado (
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
       public         heap    postgres    false            �            1259    58115    empleado_id_empleado_seq    SEQUENCE     �   CREATE SEQUENCE public.empleado_id_empleado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.empleado_id_empleado_seq;
       public          postgres    false    220            j           0    0    empleado_id_empleado_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.empleado_id_empleado_seq OWNED BY public.empleado.id_empleado;
          public          postgres    false    221            �            1259    58116    oficina    TABLE     9  CREATE TABLE public.oficina (
    id_oficina integer NOT NULL,
    nombre_oficina character varying(50) NOT NULL,
    descripcion_oficina character varying(60) NOT NULL,
    ubicacion_oficina character varying(40) NOT NULL,
    telefono_oficina integer NOT NULL,
    estado_oficina smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.oficina;
       public         heap    postgres    false            �            1259    58120    oficina_id_oficina_seq    SEQUENCE     �   CREATE SEQUENCE public.oficina_id_oficina_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.oficina_id_oficina_seq;
       public          postgres    false    222            k           0    0    oficina_id_oficina_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.oficina_id_oficina_seq OWNED BY public.oficina.id_oficina;
          public          postgres    false    223            �            1259    58121 	   proveedor    TABLE     :  CREATE TABLE public.proveedor (
    id_proveedor integer NOT NULL,
    nombre_proveedor character varying(30) NOT NULL,
    direccion_proveedor character varying(60) NOT NULL,
    correo_proveedor character varying(50) NOT NULL,
    id_almacen integer NOT NULL,
    estado_proveedor smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.proveedor;
       public         heap    postgres    false            �            1259    58125    proveedor_id_proveedor_seq    SEQUENCE     �   CREATE SEQUENCE public.proveedor_id_proveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.proveedor_id_proveedor_seq;
       public          postgres    false    224            l           0    0    proveedor_id_proveedor_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.proveedor_id_proveedor_seq OWNED BY public.proveedor.id_proveedor;
          public          postgres    false    225            �            1259    66287    sub_almacen    TABLE     �   CREATE TABLE public.sub_almacen (
    id_sub_almacen integer NOT NULL,
    direccion_sub_almacen character varying(150),
    capacidad_sub_almacen integer,
    id_oficina integer,
    estado_sub_almacen smallint DEFAULT 1
);
    DROP TABLE public.sub_almacen;
       public         heap    postgres    false            �            1259    66286    sub_almacen_id_sub_almacen_seq    SEQUENCE     �   CREATE SEQUENCE public.sub_almacen_id_sub_almacen_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 5   DROP SEQUENCE public.sub_almacen_id_sub_almacen_seq;
       public          postgres    false    233            m           0    0    sub_almacen_id_sub_almacen_seq    SEQUENCE OWNED BY     a   ALTER SEQUENCE public.sub_almacen_id_sub_almacen_seq OWNED BY public.sub_almacen.id_sub_almacen;
          public          postgres    false    232            �            1259    58165    surtidor    TABLE     �   CREATE TABLE public.surtidor (
    id_surtidor integer NOT NULL,
    ubicacion_surtidor character varying(150) NOT NULL,
    telefono_surtidor character varying(150) NOT NULL,
    estado_surtidor smallint DEFAULT '1'::smallint NOT NULL
);
    DROP TABLE public.surtidor;
       public         heap    postgres    false            �            1259    58164    surtidor_id_surtidor_seq    SEQUENCE     �   CREATE SEQUENCE public.surtidor_id_surtidor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.surtidor_id_surtidor_seq;
       public          postgres    false    227            n           0    0    surtidor_id_surtidor_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.surtidor_id_surtidor_seq OWNED BY public.surtidor.id_surtidor;
          public          postgres    false    226            �            1259    58173    vehiculo    TABLE     �   CREATE TABLE public.vehiculo (
    id_vehiculo integer NOT NULL,
    tipo_vehiculo character varying(150) NOT NULL,
    placa_vehiculo character varying(150) NOT NULL,
    estado_vehiculo smallint DEFAULT '1'::smallint NOT NULL
);
    DROP TABLE public.vehiculo;
       public         heap    postgres    false            �            1259    58181    vehiculo_surtidor    TABLE     �   CREATE TABLE public.vehiculo_surtidor (
    id_relacion integer NOT NULL,
    id_vehiculo integer,
    id_surtidor integer,
    fecha_limite date
);
 %   DROP TABLE public.vehiculo_surtidor;
       public         heap    postgres    false            �            1259    58180 !   vehiculo-surtidor_id_relacion_seq    SEQUENCE     �   CREATE SEQUENCE public."vehiculo-surtidor_id_relacion_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 :   DROP SEQUENCE public."vehiculo-surtidor_id_relacion_seq";
       public          postgres    false    231            o           0    0 !   vehiculo-surtidor_id_relacion_seq    SEQUENCE OWNED BY     i   ALTER SEQUENCE public."vehiculo-surtidor_id_relacion_seq" OWNED BY public.vehiculo_surtidor.id_relacion;
          public          postgres    false    230            �            1259    58172    vehiculo_id_vehiculo_seq    SEQUENCE     �   CREATE SEQUENCE public.vehiculo_id_vehiculo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.vehiculo_id_vehiculo_seq;
       public          postgres    false    229            p           0    0    vehiculo_id_vehiculo_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.vehiculo_id_vehiculo_seq OWNED BY public.vehiculo.id_vehiculo;
          public          postgres    false    228            �           2604    58126    almacen id_almacen    DEFAULT     z   ALTER TABLE ONLY public.almacen ALTER COLUMN id_almacen SET DEFAULT nextval('public."Almacen_id_almacen_seq"'::regclass);
 A   ALTER TABLE public.almacen ALTER COLUMN id_almacen DROP DEFAULT;
       public          postgres    false    215    214            �           2604    58127    articulo id_articulo    DEFAULT     ~   ALTER TABLE ONLY public.articulo ALTER COLUMN id_articulo SET DEFAULT nextval('public."Articulo_id_articulo_seq"'::regclass);
 C   ALTER TABLE public.articulo ALTER COLUMN id_articulo DROP DEFAULT;
       public          postgres    false    217    216            �           2604    58128    categoria id_categoria    DEFAULT     �   ALTER TABLE ONLY public.categoria ALTER COLUMN id_categoria SET DEFAULT nextval('public."Categoria_id_categoria_seq"'::regclass);
 E   ALTER TABLE public.categoria ALTER COLUMN id_categoria DROP DEFAULT;
       public          postgres    false    219    218            �           2604    58129    empleado id_empleado    DEFAULT     |   ALTER TABLE ONLY public.empleado ALTER COLUMN id_empleado SET DEFAULT nextval('public.empleado_id_empleado_seq'::regclass);
 C   ALTER TABLE public.empleado ALTER COLUMN id_empleado DROP DEFAULT;
       public          postgres    false    221    220            �           2604    58130    oficina id_oficina    DEFAULT     x   ALTER TABLE ONLY public.oficina ALTER COLUMN id_oficina SET DEFAULT nextval('public.oficina_id_oficina_seq'::regclass);
 A   ALTER TABLE public.oficina ALTER COLUMN id_oficina DROP DEFAULT;
       public          postgres    false    223    222            �           2604    58131    proveedor id_proveedor    DEFAULT     �   ALTER TABLE ONLY public.proveedor ALTER COLUMN id_proveedor SET DEFAULT nextval('public.proveedor_id_proveedor_seq'::regclass);
 E   ALTER TABLE public.proveedor ALTER COLUMN id_proveedor DROP DEFAULT;
       public          postgres    false    225    224            �           2604    66290    sub_almacen id_sub_almacen    DEFAULT     �   ALTER TABLE ONLY public.sub_almacen ALTER COLUMN id_sub_almacen SET DEFAULT nextval('public.sub_almacen_id_sub_almacen_seq'::regclass);
 I   ALTER TABLE public.sub_almacen ALTER COLUMN id_sub_almacen DROP DEFAULT;
       public          postgres    false    233    232    233            �           2604    58168    surtidor id_surtidor    DEFAULT     |   ALTER TABLE ONLY public.surtidor ALTER COLUMN id_surtidor SET DEFAULT nextval('public.surtidor_id_surtidor_seq'::regclass);
 C   ALTER TABLE public.surtidor ALTER COLUMN id_surtidor DROP DEFAULT;
       public          postgres    false    227    226    227            �           2604    58176    vehiculo id_vehiculo    DEFAULT     |   ALTER TABLE ONLY public.vehiculo ALTER COLUMN id_vehiculo SET DEFAULT nextval('public.vehiculo_id_vehiculo_seq'::regclass);
 C   ALTER TABLE public.vehiculo ALTER COLUMN id_vehiculo DROP DEFAULT;
       public          postgres    false    228    229    229            �           2604    58184    vehiculo_surtidor id_relacion    DEFAULT     �   ALTER TABLE ONLY public.vehiculo_surtidor ALTER COLUMN id_relacion SET DEFAULT nextval('public."vehiculo-surtidor_id_relacion_seq"'::regclass);
 L   ALTER TABLE public.vehiculo_surtidor ALTER COLUMN id_relacion DROP DEFAULT;
       public          postgres    false    231    230    231            M          0    58095    almacen 
   TABLE DATA           b   COPY public.almacen (id_almacen, direccion_almacen, telefono, responsable, capacidad) FROM stdin;
    public          postgres    false    214   ;c       O          0    58099    articulo 
   TABLE DATA           �   COPY public.articulo (id_articulo, nombre_articulo, descripcion_articulo, precio_unitario, id_categoria, id_almacen, estado_articulo) FROM stdin;
    public          postgres    false    216   �c       Q          0    58106 	   categoria 
   TABLE DATA           U   COPY public.categoria (id_categoria, nombre_categoria, estado_categoria) FROM stdin;
    public          postgres    false    218   �d       S          0    58111    empleado 
   TABLE DATA           �   COPY public.empleado (id_empleado, nombre, apellido_paterno, apellido_materno, correo_empleado, estado_empleado, password, id_oficina) FROM stdin;
    public          postgres    false    220   �d       U          0    58116    oficina 
   TABLE DATA           �   COPY public.oficina (id_oficina, nombre_oficina, descripcion_oficina, ubicacion_oficina, telefono_oficina, estado_oficina) FROM stdin;
    public          postgres    false    222   �e       W          0    58121 	   proveedor 
   TABLE DATA           �   COPY public.proveedor (id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen, estado_proveedor) FROM stdin;
    public          postgres    false    224   >f       `          0    66287    sub_almacen 
   TABLE DATA           �   COPY public.sub_almacen (id_sub_almacen, direccion_sub_almacen, capacidad_sub_almacen, id_oficina, estado_sub_almacen) FROM stdin;
    public          postgres    false    233   �f       Z          0    58165    surtidor 
   TABLE DATA           g   COPY public.surtidor (id_surtidor, ubicacion_surtidor, telefono_surtidor, estado_surtidor) FROM stdin;
    public          postgres    false    227   g       \          0    58173    vehiculo 
   TABLE DATA           _   COPY public.vehiculo (id_vehiculo, tipo_vehiculo, placa_vehiculo, estado_vehiculo) FROM stdin;
    public          postgres    false    229   Tg       ^          0    58181    vehiculo_surtidor 
   TABLE DATA           `   COPY public.vehiculo_surtidor (id_relacion, id_vehiculo, id_surtidor, fecha_limite) FROM stdin;
    public          postgres    false    231   �g       q           0    0    Almacen_id_almacen_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public."Almacen_id_almacen_seq"', 1, true);
          public          postgres    false    215            r           0    0    Articulo_id_articulo_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."Articulo_id_articulo_seq"', 12, true);
          public          postgres    false    217            s           0    0    Categoria_id_categoria_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public."Categoria_id_categoria_seq"', 3, true);
          public          postgres    false    219            t           0    0    empleado_id_empleado_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.empleado_id_empleado_seq', 7, true);
          public          postgres    false    221            u           0    0    oficina_id_oficina_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.oficina_id_oficina_seq', 2, true);
          public          postgres    false    223            v           0    0    proveedor_id_proveedor_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.proveedor_id_proveedor_seq', 3, true);
          public          postgres    false    225            w           0    0    sub_almacen_id_sub_almacen_seq    SEQUENCE SET     L   SELECT pg_catalog.setval('public.sub_almacen_id_sub_almacen_seq', 3, true);
          public          postgres    false    232            x           0    0    surtidor_id_surtidor_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.surtidor_id_surtidor_seq', 2, true);
          public          postgres    false    226            y           0    0 !   vehiculo-surtidor_id_relacion_seq    SEQUENCE SET     Q   SELECT pg_catalog.setval('public."vehiculo-surtidor_id_relacion_seq"', 1, true);
          public          postgres    false    230            z           0    0    vehiculo_id_vehiculo_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.vehiculo_id_vehiculo_seq', 28, true);
          public          postgres    false    228            �           2606    58133    almacen Almacen_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.almacen
    ADD CONSTRAINT "Almacen_pkey" PRIMARY KEY (id_almacen);
 @   ALTER TABLE ONLY public.almacen DROP CONSTRAINT "Almacen_pkey";
       public            postgres    false    214            �           2606    58135    articulo Articulo_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT "Articulo_pkey" PRIMARY KEY (id_articulo);
 B   ALTER TABLE ONLY public.articulo DROP CONSTRAINT "Articulo_pkey";
       public            postgres    false    216            �           2606    58137    categoria Categoria_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT "Categoria_pkey" PRIMARY KEY (id_categoria);
 D   ALTER TABLE ONLY public.categoria DROP CONSTRAINT "Categoria_pkey";
       public            postgres    false    218            �           2606    58186    vehiculo_surtidor Relacion_pkey 
   CONSTRAINT     h   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT "Relacion_pkey" PRIMARY KEY (id_relacion);
 K   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT "Relacion_pkey";
       public            postgres    false    231            �           2606    58139    empleado empleado_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (id_empleado);
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_pkey;
       public            postgres    false    220            �           2606    58141    oficina oficina_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.oficina
    ADD CONSTRAINT oficina_pkey PRIMARY KEY (id_oficina);
 >   ALTER TABLE ONLY public.oficina DROP CONSTRAINT oficina_pkey;
       public            postgres    false    222            �           2606    58143    proveedor proveedor_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (id_proveedor);
 B   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_pkey;
       public            postgres    false    224            �           2606    66293    sub_almacen sub_almacen_pkey 
   CONSTRAINT     f   ALTER TABLE ONLY public.sub_almacen
    ADD CONSTRAINT sub_almacen_pkey PRIMARY KEY (id_sub_almacen);
 F   ALTER TABLE ONLY public.sub_almacen DROP CONSTRAINT sub_almacen_pkey;
       public            postgres    false    233            �           2606    58171    surtidor surtidor_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.surtidor
    ADD CONSTRAINT surtidor_pkey PRIMARY KEY (id_surtidor);
 @   ALTER TABLE ONLY public.surtidor DROP CONSTRAINT surtidor_pkey;
       public            postgres    false    227            �           2606    58179    vehiculo vehiculo_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.vehiculo
    ADD CONSTRAINT vehiculo_pkey PRIMARY KEY (id_vehiculo);
 @   ALTER TABLE ONLY public.vehiculo DROP CONSTRAINT vehiculo_pkey;
       public            postgres    false    229            �           2606    58144    articulo fk_almacen    FK CONSTRAINT        ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 =   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_almacen;
       public          postgres    false    214    3237    216            �           2606    58149    proveedor fk_almacen    FK CONSTRAINT     �   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 >   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT fk_almacen;
       public          postgres    false    3237    224    214            �           2606    58154    articulo fk_categoria    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES public.categoria(id_categoria);
 ?   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_categoria;
       public          postgres    false    218    3241    216            �           2606    58159    empleado fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina) NOT VALID;
 =   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fk_oficina;
       public          postgres    false    220    222    3245            �           2606    66294    sub_almacen fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.sub_almacen
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina) NOT VALID;
 @   ALTER TABLE ONLY public.sub_almacen DROP CONSTRAINT fk_oficina;
       public          postgres    false    3245    222    233            �           2606    58187    vehiculo_surtidor fk_surtidor    FK CONSTRAINT     �   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT fk_surtidor FOREIGN KEY (id_surtidor) REFERENCES public.surtidor(id_surtidor);
 G   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT fk_surtidor;
       public          postgres    false    227    3249    231            �           2606    58192    vehiculo_surtidor fk_vehiculo    FK CONSTRAINT     �   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT fk_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES public.vehiculo(id_vehiculo);
 G   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT fk_vehiculo;
       public          postgres    false    229    231    3251            M   B   x�3�tN��IUp����SH�+)JU��KO,�T�TH���,K,�4426153�����410������ #�j      O     x�eQ9r� ��W�\����z��&Μ�8$��J�z#��*�H�覛��x'��馠#��FQ�-��KM92T5���W��-hKl5��d�>��7�XSG�s����T�J�`��HǄ�t)mQ���-q~�׆a�����־ӎ��㎒�)�O]�&��w�MR.�坌!fg��yX�u��d�e�%^Ҥq�DH);5�b�Z9��n�#�<�w?��V��`�hD�Q��������OB���1h�4PpUqBp����t�)��OA}=	!~��      Q   6   x�3��M,JNL�/J-�4�2����J,VHIU(H,H�
q�$d&��c���� ��X      S   �   x�U�M�0����Spb���c��h�elkZ�m�	�b0��ɛy��8S���Z΄ˠ"��m�&Y7ړu�
���;HQ��.�T�ّ"�ZGP!F�48�l%�Ţ����c��91u�.v��	ڤlL�L~����;�l�'�?�ӻ�R�~�JQ      U   |   x�}�K
�0D��)t�Ҙ��]��[
�9~�M7��潙�l��ðr�J�rr��rU���69Н<�9��',)��X���w��F�a�f��3x?�R�遟��?o�KJ��v=�      W   o   x�u�1�0D�z}�=A$�� u�����f�����C�D�i��D�bt���*�С�:^ڐ��̝v�Δ�I�N��Rmo˳Ӈ@�7���������1��SaC�;8      `   ;   x�3�t�)�WN�I�M�KN�445�4�4�2�J��%&s���Ɯ��DQ� L�g      Z   <   x�3��ITN�I�M�KN�471�05��4�2�t�)�WN�KL�415�0F@�=... ���      \   m   x�U��
�0��ǈ�yi)X*�6)�N��5�B��pf���:�;ɰ��Q�E�ecٮl_V[B	��������V����eA� `L���'Ab�m[c�yQ�%Q      ^      x�3�4B##c]S]#S�=... &�N     