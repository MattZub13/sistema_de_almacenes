PGDMP         "                {            db    14.5    14.5 Q    W           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            X           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            Y           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            Z           1262    90361    db    DATABASE     _   CREATE DATABASE db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_Mexico.1252';
    DROP DATABASE db;
                postgres    false            �            1259    90362    almacen    TABLE     �   CREATE TABLE public.almacen (
    id_almacen integer NOT NULL,
    direccion_almacen character varying(70) NOT NULL,
    telefono character varying(10) NOT NULL,
    responsable character varying(25),
    capacidad integer NOT NULL
);
    DROP TABLE public.almacen;
       public         heap    postgres    false            �            1259    90365    Almacen_id_almacen_seq    SEQUENCE     �   CREATE SEQUENCE public."Almacen_id_almacen_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public."Almacen_id_almacen_seq";
       public          postgres    false    209            [           0    0    Almacen_id_almacen_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public."Almacen_id_almacen_seq" OWNED BY public.almacen.id_almacen;
          public          postgres    false    210            �            1259    90366    articulo    TABLE     K  CREATE TABLE public.articulo (
    id_articulo integer NOT NULL,
    nombre_articulo character varying(30) NOT NULL,
    descripcion_articulo character varying(60) NOT NULL,
    precio_unitario numeric NOT NULL,
    id_categoria integer NOT NULL,
    id_almacen integer NOT NULL,
    estado_articulo smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.articulo;
       public         heap    postgres    false            �            1259    90372    Articulo_id_articulo_seq    SEQUENCE     �   CREATE SEQUENCE public."Articulo_id_articulo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."Articulo_id_articulo_seq";
       public          postgres    false    211            \           0    0    Articulo_id_articulo_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public."Articulo_id_articulo_seq" OWNED BY public.articulo.id_articulo;
          public          postgres    false    212            �            1259    90373 	   categoria    TABLE     �   CREATE TABLE public.categoria (
    id_categoria integer NOT NULL,
    nombre_categoria character varying(25) NOT NULL,
    estado_categoria smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.categoria;
       public         heap    postgres    false            �            1259    90377    Categoria_id_categoria_seq    SEQUENCE     �   CREATE SEQUENCE public."Categoria_id_categoria_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."Categoria_id_categoria_seq";
       public          postgres    false    213            ]           0    0    Categoria_id_categoria_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public."Categoria_id_categoria_seq" OWNED BY public.categoria.id_categoria;
          public          postgres    false    214            �            1259    90378    empleado    TABLE     �  CREATE TABLE public.empleado (
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
       public         heap    postgres    false            �            1259    90382    empleado_id_empleado_seq    SEQUENCE     �   CREATE SEQUENCE public.empleado_id_empleado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.empleado_id_empleado_seq;
       public          postgres    false    215            ^           0    0    empleado_id_empleado_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.empleado_id_empleado_seq OWNED BY public.empleado.id_empleado;
          public          postgres    false    216            �            1259    90472    ingreso    TABLE     �   CREATE TABLE public.ingreso (
    id_ingreso integer NOT NULL,
    id_proveedor integer NOT NULL,
    fecha_ingreso timestamp without time zone DEFAULT CURRENT_TIMESTAMP NOT NULL
);
    DROP TABLE public.ingreso;
       public         heap    postgres    false            �            1259    90471    ingreso_id_ingreso_seq    SEQUENCE     �   CREATE SEQUENCE public.ingreso_id_ingreso_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.ingreso_id_ingreso_seq;
       public          postgres    false    228            _           0    0    ingreso_id_ingreso_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.ingreso_id_ingreso_seq OWNED BY public.ingreso.id_ingreso;
          public          postgres    false    227            �            1259    90383    oficina    TABLE     9  CREATE TABLE public.oficina (
    id_oficina integer NOT NULL,
    nombre_oficina character varying(50) NOT NULL,
    descripcion_oficina character varying(60) NOT NULL,
    ubicacion_oficina character varying(40) NOT NULL,
    telefono_oficina integer NOT NULL,
    estado_oficina smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.oficina;
       public         heap    postgres    false            �            1259    90387    oficina_id_oficina_seq    SEQUENCE     �   CREATE SEQUENCE public.oficina_id_oficina_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.oficina_id_oficina_seq;
       public          postgres    false    217            `           0    0    oficina_id_oficina_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.oficina_id_oficina_seq OWNED BY public.oficina.id_oficina;
          public          postgres    false    218            �            1259    90388 	   proveedor    TABLE     :  CREATE TABLE public.proveedor (
    id_proveedor integer NOT NULL,
    nombre_proveedor character varying(30) NOT NULL,
    direccion_proveedor character varying(60) NOT NULL,
    correo_proveedor character varying(50) NOT NULL,
    id_almacen integer NOT NULL,
    estado_proveedor smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.proveedor;
       public         heap    postgres    false            �            1259    90392    proveedor_id_proveedor_seq    SEQUENCE     �   CREATE SEQUENCE public.proveedor_id_proveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.proveedor_id_proveedor_seq;
       public          postgres    false    219            a           0    0    proveedor_id_proveedor_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.proveedor_id_proveedor_seq OWNED BY public.proveedor.id_proveedor;
          public          postgres    false    220            �            1259    90393    surtidor    TABLE     �   CREATE TABLE public.surtidor (
    id_surtidor integer NOT NULL,
    ubicacion_surtidor character varying(150) NOT NULL,
    telefono_surtidor character varying(150) NOT NULL,
    estado_surtidor smallint DEFAULT '1'::smallint NOT NULL
);
    DROP TABLE public.surtidor;
       public         heap    postgres    false            �            1259    90397    surtidor_id_surtidor_seq    SEQUENCE     �   CREATE SEQUENCE public.surtidor_id_surtidor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.surtidor_id_surtidor_seq;
       public          postgres    false    221            b           0    0    surtidor_id_surtidor_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.surtidor_id_surtidor_seq OWNED BY public.surtidor.id_surtidor;
          public          postgres    false    222            �            1259    90398    vehiculo    TABLE     �   CREATE TABLE public.vehiculo (
    id_vehiculo integer NOT NULL,
    tipo_vehiculo character varying(150) NOT NULL,
    placa_vehiculo character varying(150) NOT NULL,
    estado_vehiculo smallint DEFAULT '1'::smallint NOT NULL
);
    DROP TABLE public.vehiculo;
       public         heap    postgres    false            �            1259    90406    vehiculo_id_vehiculo_seq    SEQUENCE     �   CREATE SEQUENCE public.vehiculo_id_vehiculo_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.vehiculo_id_vehiculo_seq;
       public          postgres    false    223            c           0    0    vehiculo_id_vehiculo_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.vehiculo_id_vehiculo_seq OWNED BY public.vehiculo.id_vehiculo;
          public          postgres    false    225            �            1259    90402    vehiculo_surtidor    TABLE     �   CREATE TABLE public.vehiculo_surtidor (
    id_vehiculo integer,
    id_surtidor integer,
    fecha_limite date,
    id_vs integer NOT NULL
);
 %   DROP TABLE public.vehiculo_surtidor;
       public         heap    postgres    false            �            1259    90464    vehiculo_surtidor_id_vs_seq    SEQUENCE     �   CREATE SEQUENCE public.vehiculo_surtidor_id_vs_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 2   DROP SEQUENCE public.vehiculo_surtidor_id_vs_seq;
       public          postgres    false    224            d           0    0    vehiculo_surtidor_id_vs_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public.vehiculo_surtidor_id_vs_seq OWNED BY public.vehiculo_surtidor.id_vs;
          public          postgres    false    226            �           2604    90407    almacen id_almacen    DEFAULT     z   ALTER TABLE ONLY public.almacen ALTER COLUMN id_almacen SET DEFAULT nextval('public."Almacen_id_almacen_seq"'::regclass);
 A   ALTER TABLE public.almacen ALTER COLUMN id_almacen DROP DEFAULT;
       public          postgres    false    210    209            �           2604    90408    articulo id_articulo    DEFAULT     ~   ALTER TABLE ONLY public.articulo ALTER COLUMN id_articulo SET DEFAULT nextval('public."Articulo_id_articulo_seq"'::regclass);
 C   ALTER TABLE public.articulo ALTER COLUMN id_articulo DROP DEFAULT;
       public          postgres    false    212    211            �           2604    90409    categoria id_categoria    DEFAULT     �   ALTER TABLE ONLY public.categoria ALTER COLUMN id_categoria SET DEFAULT nextval('public."Categoria_id_categoria_seq"'::regclass);
 E   ALTER TABLE public.categoria ALTER COLUMN id_categoria DROP DEFAULT;
       public          postgres    false    214    213            �           2604    90410    empleado id_empleado    DEFAULT     |   ALTER TABLE ONLY public.empleado ALTER COLUMN id_empleado SET DEFAULT nextval('public.empleado_id_empleado_seq'::regclass);
 C   ALTER TABLE public.empleado ALTER COLUMN id_empleado DROP DEFAULT;
       public          postgres    false    216    215            �           2604    90475    ingreso id_ingreso    DEFAULT     x   ALTER TABLE ONLY public.ingreso ALTER COLUMN id_ingreso SET DEFAULT nextval('public.ingreso_id_ingreso_seq'::regclass);
 A   ALTER TABLE public.ingreso ALTER COLUMN id_ingreso DROP DEFAULT;
       public          postgres    false    228    227    228            �           2604    90411    oficina id_oficina    DEFAULT     x   ALTER TABLE ONLY public.oficina ALTER COLUMN id_oficina SET DEFAULT nextval('public.oficina_id_oficina_seq'::regclass);
 A   ALTER TABLE public.oficina ALTER COLUMN id_oficina DROP DEFAULT;
       public          postgres    false    218    217            �           2604    90412    proveedor id_proveedor    DEFAULT     �   ALTER TABLE ONLY public.proveedor ALTER COLUMN id_proveedor SET DEFAULT nextval('public.proveedor_id_proveedor_seq'::regclass);
 E   ALTER TABLE public.proveedor ALTER COLUMN id_proveedor DROP DEFAULT;
       public          postgres    false    220    219            �           2604    90413    surtidor id_surtidor    DEFAULT     |   ALTER TABLE ONLY public.surtidor ALTER COLUMN id_surtidor SET DEFAULT nextval('public.surtidor_id_surtidor_seq'::regclass);
 C   ALTER TABLE public.surtidor ALTER COLUMN id_surtidor DROP DEFAULT;
       public          postgres    false    222    221            �           2604    90414    vehiculo id_vehiculo    DEFAULT     |   ALTER TABLE ONLY public.vehiculo ALTER COLUMN id_vehiculo SET DEFAULT nextval('public.vehiculo_id_vehiculo_seq'::regclass);
 C   ALTER TABLE public.vehiculo ALTER COLUMN id_vehiculo DROP DEFAULT;
       public          postgres    false    225    223            �           2604    90465    vehiculo_surtidor id_vs    DEFAULT     �   ALTER TABLE ONLY public.vehiculo_surtidor ALTER COLUMN id_vs SET DEFAULT nextval('public.vehiculo_surtidor_id_vs_seq'::regclass);
 F   ALTER TABLE public.vehiculo_surtidor ALTER COLUMN id_vs DROP DEFAULT;
       public          postgres    false    226    224            A          0    90362    almacen 
   TABLE DATA           b   COPY public.almacen (id_almacen, direccion_almacen, telefono, responsable, capacidad) FROM stdin;
    public          postgres    false    209   �a       C          0    90366    articulo 
   TABLE DATA           �   COPY public.articulo (id_articulo, nombre_articulo, descripcion_articulo, precio_unitario, id_categoria, id_almacen, estado_articulo) FROM stdin;
    public          postgres    false    211   b       E          0    90373 	   categoria 
   TABLE DATA           U   COPY public.categoria (id_categoria, nombre_categoria, estado_categoria) FROM stdin;
    public          postgres    false    213   Gc       G          0    90378    empleado 
   TABLE DATA           �   COPY public.empleado (id_empleado, nombre, apellido_paterno, apellido_materno, correo_empleado, estado_empleado, password, id_oficina) FROM stdin;
    public          postgres    false    215   �c       T          0    90472    ingreso 
   TABLE DATA           J   COPY public.ingreso (id_ingreso, id_proveedor, fecha_ingreso) FROM stdin;
    public          postgres    false    228   @d       I          0    90383    oficina 
   TABLE DATA           �   COPY public.oficina (id_oficina, nombre_oficina, descripcion_oficina, ubicacion_oficina, telefono_oficina, estado_oficina) FROM stdin;
    public          postgres    false    217   �d       K          0    90388 	   proveedor 
   TABLE DATA           �   COPY public.proveedor (id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen, estado_proveedor) FROM stdin;
    public          postgres    false    219   e       M          0    90393    surtidor 
   TABLE DATA           g   COPY public.surtidor (id_surtidor, ubicacion_surtidor, telefono_surtidor, estado_surtidor) FROM stdin;
    public          postgres    false    221   �e       O          0    90398    vehiculo 
   TABLE DATA           _   COPY public.vehiculo (id_vehiculo, tipo_vehiculo, placa_vehiculo, estado_vehiculo) FROM stdin;
    public          postgres    false    223   �e       P          0    90402    vehiculo_surtidor 
   TABLE DATA           Z   COPY public.vehiculo_surtidor (id_vehiculo, id_surtidor, fecha_limite, id_vs) FROM stdin;
    public          postgres    false    224   af       e           0    0    Almacen_id_almacen_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public."Almacen_id_almacen_seq"', 1, true);
          public          postgres    false    210            f           0    0    Articulo_id_articulo_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."Articulo_id_articulo_seq"', 12, true);
          public          postgres    false    212            g           0    0    Categoria_id_categoria_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public."Categoria_id_categoria_seq"', 3, true);
          public          postgres    false    214            h           0    0    empleado_id_empleado_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.empleado_id_empleado_seq', 7, true);
          public          postgres    false    216            i           0    0    ingreso_id_ingreso_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.ingreso_id_ingreso_seq', 2, true);
          public          postgres    false    227            j           0    0    oficina_id_oficina_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.oficina_id_oficina_seq', 2, true);
          public          postgres    false    218            k           0    0    proveedor_id_proveedor_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.proveedor_id_proveedor_seq', 3, true);
          public          postgres    false    220            l           0    0    surtidor_id_surtidor_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.surtidor_id_surtidor_seq', 4, true);
          public          postgres    false    222            m           0    0    vehiculo_id_vehiculo_seq    SEQUENCE SET     G   SELECT pg_catalog.setval('public.vehiculo_id_vehiculo_seq', 33, true);
          public          postgres    false    225            n           0    0    vehiculo_surtidor_id_vs_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public.vehiculo_surtidor_id_vs_seq', 4, true);
          public          postgres    false    226            �           2606    90417    almacen Almacen_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.almacen
    ADD CONSTRAINT "Almacen_pkey" PRIMARY KEY (id_almacen);
 @   ALTER TABLE ONLY public.almacen DROP CONSTRAINT "Almacen_pkey";
       public            postgres    false    209            �           2606    90419    articulo Articulo_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT "Articulo_pkey" PRIMARY KEY (id_articulo);
 B   ALTER TABLE ONLY public.articulo DROP CONSTRAINT "Articulo_pkey";
       public            postgres    false    211            �           2606    90421    categoria Categoria_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT "Categoria_pkey" PRIMARY KEY (id_categoria);
 D   ALTER TABLE ONLY public.categoria DROP CONSTRAINT "Categoria_pkey";
       public            postgres    false    213            �           2606    90425    empleado empleado_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (id_empleado);
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_pkey;
       public            postgres    false    215            �           2606    90478    ingreso ingreso_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.ingreso
    ADD CONSTRAINT ingreso_pkey PRIMARY KEY (id_ingreso);
 >   ALTER TABLE ONLY public.ingreso DROP CONSTRAINT ingreso_pkey;
       public            postgres    false    228            �           2606    90427    oficina oficina_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.oficina
    ADD CONSTRAINT oficina_pkey PRIMARY KEY (id_oficina);
 >   ALTER TABLE ONLY public.oficina DROP CONSTRAINT oficina_pkey;
       public            postgres    false    217            �           2606    90429    proveedor proveedor_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (id_proveedor);
 B   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_pkey;
       public            postgres    false    219            �           2606    90431    surtidor surtidor_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.surtidor
    ADD CONSTRAINT surtidor_pkey PRIMARY KEY (id_surtidor);
 @   ALTER TABLE ONLY public.surtidor DROP CONSTRAINT surtidor_pkey;
       public            postgres    false    221            �           2606    90433    vehiculo vehiculo_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.vehiculo
    ADD CONSTRAINT vehiculo_pkey PRIMARY KEY (id_vehiculo);
 @   ALTER TABLE ONLY public.vehiculo DROP CONSTRAINT vehiculo_pkey;
       public            postgres    false    223            �           2606    90470 (   vehiculo_surtidor vehiculo_surtidor_pkey 
   CONSTRAINT     i   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT vehiculo_surtidor_pkey PRIMARY KEY (id_vs);
 R   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT vehiculo_surtidor_pkey;
       public            postgres    false    224            �           2606    90434    articulo fk_almacen    FK CONSTRAINT        ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 =   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_almacen;
       public          postgres    false    211    3228    209            �           2606    90439    proveedor fk_almacen    FK CONSTRAINT     �   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 >   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT fk_almacen;
       public          postgres    false    219    3228    209            �           2606    90444    articulo fk_categoria    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES public.categoria(id_categoria);
 ?   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_categoria;
       public          postgres    false    213    211    3232            �           2606    90449    empleado fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina) NOT VALID;
 =   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fk_oficina;
       public          postgres    false    215    3236    217            �           2606    90479    ingreso fk_proveedor    FK CONSTRAINT     �   ALTER TABLE ONLY public.ingreso
    ADD CONSTRAINT fk_proveedor FOREIGN KEY (id_proveedor) REFERENCES public.proveedor(id_proveedor);
 >   ALTER TABLE ONLY public.ingreso DROP CONSTRAINT fk_proveedor;
       public          postgres    false    219    3238    228            �           2606    90454    vehiculo_surtidor fk_surtidor    FK CONSTRAINT     �   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT fk_surtidor FOREIGN KEY (id_surtidor) REFERENCES public.surtidor(id_surtidor);
 G   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT fk_surtidor;
       public          postgres    false    221    3240    224            �           2606    90459    vehiculo_surtidor fk_vehiculo    FK CONSTRAINT     �   ALTER TABLE ONLY public.vehiculo_surtidor
    ADD CONSTRAINT fk_vehiculo FOREIGN KEY (id_vehiculo) REFERENCES public.vehiculo(id_vehiculo);
 G   ALTER TABLE ONLY public.vehiculo_surtidor DROP CONSTRAINT fk_vehiculo;
       public          postgres    false    223    224    3242            A   B   x�3�tN��IUp����SH�+)JU��KO,�T�TH���,K,�4426153�����410������ #�j      C     x�eQ9r� ��W�\����z��&Μ�8$��J�z#��*�H�覛��x'��馠#��FQ�-��KM92T5���W��-hKl5��d�>��7�XSG�s����T�J�`��HǄ�t)mQ���-q~�׆a�����־ӎ��㎒�)�O]�&��w�MR.�坌!fg��yX�u��d�e�%^Ҥq�DH);5�b�Z9��n�#�<�w?��V��`�hD�Q��������OB���1h�4PpUqBp����t�)��OA}=	!~��      E   6   x�3��M,JNL�/J-�4�2����J,VHIU(H,H�
q�$d&��c���� ��X      G   �   x�U�M�0����Spb���c��h�elkZ�m�	�b0��ɛy��8S���Z΄ˠ"��m�&Y7ړu�
���;HQ��.�T�ّ"�ZGP!F�48�l%�Ţ����c��91u�.v��	ڤlL�L~����;�l�'�?�ӻ�R�~�JQ      T   9   x�e�Q�0��F֗%-�i��~o�Q��u��ެ\п����'|���      I   |   x�}�K
�0D��)t�Ҙ��]��[
�9~�M7��潙�l��ðr�J�rr��rU���69Н<�9��',)��X���w��F�a�f��3x?�R�遟��?o�KJ��v=�      K   o   x�u�1�0D�z}�=A$�� u�����f�����C�D�i��D�bt���*�С�:^ڐ��̝v�Δ�I�N��Rmo˳Ӈ@�7���������1��SaC�;8      M   [   x�3��ITN�I�M�KN�471�05��4�2�t�)�WN�KL�415�0F@	�"T��\Ɯ��y
�E�y�����&�F&��@�=... f��      O   R   x�34�,KL��K-I��	�52�4�2�D�����ō�♕@C�1����Ƙ3917"hlT���X����� ��      P   5   x�Mʱ  �9���IA�_���`�,NW���@�N/��D����n$��     