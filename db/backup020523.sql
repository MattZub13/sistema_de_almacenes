PGDMP                         {            db    14.5    14.5 2    )           0    0    ENCODING    ENCODING        SET client_encoding = 'UTF8';
                      false            *           0    0 
   STDSTRINGS 
   STDSTRINGS     (   SET standard_conforming_strings = 'on';
                      false            +           0    0 
   SEARCHPATH 
   SEARCHPATH     8   SELECT pg_catalog.set_config('search_path', '', false);
                      false            ,           1262    82093    db    DATABASE     _   CREATE DATABASE db WITH TEMPLATE = template0 ENCODING = 'UTF8' LOCALE = 'Spanish_Mexico.1252';
    DROP DATABASE db;
                postgres    false            �            1259    82103    almacen    TABLE     �   CREATE TABLE public.almacen (
    id_almacen integer NOT NULL,
    direccion_almacen character varying(70) NOT NULL,
    telefono character varying(10) NOT NULL,
    responsable character varying(25),
    capacidad integer NOT NULL
);
    DROP TABLE public.almacen;
       public         heap    postgres    false            �            1259    82102    Almacen_id_almacen_seq    SEQUENCE     �   CREATE SEQUENCE public."Almacen_id_almacen_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public."Almacen_id_almacen_seq";
       public          postgres    false    212            -           0    0    Almacen_id_almacen_seq    SEQUENCE OWNED BY     S   ALTER SEQUENCE public."Almacen_id_almacen_seq" OWNED BY public.almacen.id_almacen;
          public          postgres    false    211            �            1259    82110    articulo    TABLE     K  CREATE TABLE public.articulo (
    id_articulo integer NOT NULL,
    nombre_articulo character varying(30) NOT NULL,
    descripcion_articulo character varying(60) NOT NULL,
    precio_unitario numeric NOT NULL,
    id_categoria integer NOT NULL,
    id_almacen integer NOT NULL,
    estado_articulo smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.articulo;
       public         heap    postgres    false            �            1259    82109    Articulo_id_articulo_seq    SEQUENCE     �   CREATE SEQUENCE public."Articulo_id_articulo_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public."Articulo_id_articulo_seq";
       public          postgres    false    214            .           0    0    Articulo_id_articulo_seq    SEQUENCE OWNED BY     W   ALTER SEQUENCE public."Articulo_id_articulo_seq" OWNED BY public.articulo.id_articulo;
          public          postgres    false    213            �            1259    82095 	   categoria    TABLE     �   CREATE TABLE public.categoria (
    id_categoria integer NOT NULL,
    nombre_categoria character varying(25) NOT NULL,
    estado_categoria smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.categoria;
       public         heap    postgres    false            �            1259    82094    Categoria_id_categoria_seq    SEQUENCE     �   CREATE SEQUENCE public."Categoria_id_categoria_seq"
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 3   DROP SEQUENCE public."Categoria_id_categoria_seq";
       public          postgres    false    210            /           0    0    Categoria_id_categoria_seq    SEQUENCE OWNED BY     [   ALTER SEQUENCE public."Categoria_id_categoria_seq" OWNED BY public.categoria.id_categoria;
          public          postgres    false    209            �            1259    90286    empleado    TABLE     �  CREATE TABLE public.empleado (
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
       public         heap    postgres    false            �            1259    90285    empleado_id_empleado_seq    SEQUENCE     �   CREATE SEQUENCE public.empleado_id_empleado_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 /   DROP SEQUENCE public.empleado_id_empleado_seq;
       public          postgres    false    216            0           0    0    empleado_id_empleado_seq    SEQUENCE OWNED BY     U   ALTER SEQUENCE public.empleado_id_empleado_seq OWNED BY public.empleado.id_empleado;
          public          postgres    false    215            �            1259    90307    oficina    TABLE     9  CREATE TABLE public.oficina (
    id_oficina integer NOT NULL,
    nombre_oficina character varying(50) NOT NULL,
    descripcion_oficina character varying(60) NOT NULL,
    ubicacion_oficina character varying(40) NOT NULL,
    telefono_oficina integer NOT NULL,
    estado_oficina smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.oficina;
       public         heap    postgres    false            �            1259    90306    oficina_id_oficina_seq    SEQUENCE     �   CREATE SEQUENCE public.oficina_id_oficina_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 -   DROP SEQUENCE public.oficina_id_oficina_seq;
       public          postgres    false    220            1           0    0    oficina_id_oficina_seq    SEQUENCE OWNED BY     Q   ALTER SEQUENCE public.oficina_id_oficina_seq OWNED BY public.oficina.id_oficina;
          public          postgres    false    219            �            1259    90294 	   proveedor    TABLE     :  CREATE TABLE public.proveedor (
    id_proveedor integer NOT NULL,
    nombre_proveedor character varying(30) NOT NULL,
    direccion_proveedor character varying(60) NOT NULL,
    correo_proveedor character varying(50) NOT NULL,
    id_almacen integer NOT NULL,
    estado_proveedor smallint DEFAULT 1 NOT NULL
);
    DROP TABLE public.proveedor;
       public         heap    postgres    false            �            1259    90293    proveedor_id_proveedor_seq    SEQUENCE     �   CREATE SEQUENCE public.proveedor_id_proveedor_seq
    AS integer
    START WITH 1
    INCREMENT BY 1
    NO MINVALUE
    NO MAXVALUE
    CACHE 1;
 1   DROP SEQUENCE public.proveedor_id_proveedor_seq;
       public          postgres    false    218            2           0    0    proveedor_id_proveedor_seq    SEQUENCE OWNED BY     Y   ALTER SEQUENCE public.proveedor_id_proveedor_seq OWNED BY public.proveedor.id_proveedor;
          public          postgres    false    217            w           2604    82106    almacen id_almacen    DEFAULT     z   ALTER TABLE ONLY public.almacen ALTER COLUMN id_almacen SET DEFAULT nextval('public."Almacen_id_almacen_seq"'::regclass);
 A   ALTER TABLE public.almacen ALTER COLUMN id_almacen DROP DEFAULT;
       public          postgres    false    211    212    212            x           2604    82113    articulo id_articulo    DEFAULT     ~   ALTER TABLE ONLY public.articulo ALTER COLUMN id_articulo SET DEFAULT nextval('public."Articulo_id_articulo_seq"'::regclass);
 C   ALTER TABLE public.articulo ALTER COLUMN id_articulo DROP DEFAULT;
       public          postgres    false    214    213    214            u           2604    82098    categoria id_categoria    DEFAULT     �   ALTER TABLE ONLY public.categoria ALTER COLUMN id_categoria SET DEFAULT nextval('public."Categoria_id_categoria_seq"'::regclass);
 E   ALTER TABLE public.categoria ALTER COLUMN id_categoria DROP DEFAULT;
       public          postgres    false    209    210    210            z           2604    90289    empleado id_empleado    DEFAULT     |   ALTER TABLE ONLY public.empleado ALTER COLUMN id_empleado SET DEFAULT nextval('public.empleado_id_empleado_seq'::regclass);
 C   ALTER TABLE public.empleado ALTER COLUMN id_empleado DROP DEFAULT;
       public          postgres    false    215    216    216            ~           2604    90310    oficina id_oficina    DEFAULT     x   ALTER TABLE ONLY public.oficina ALTER COLUMN id_oficina SET DEFAULT nextval('public.oficina_id_oficina_seq'::regclass);
 A   ALTER TABLE public.oficina ALTER COLUMN id_oficina DROP DEFAULT;
       public          postgres    false    219    220    220            |           2604    90297    proveedor id_proveedor    DEFAULT     �   ALTER TABLE ONLY public.proveedor ALTER COLUMN id_proveedor SET DEFAULT nextval('public.proveedor_id_proveedor_seq'::regclass);
 E   ALTER TABLE public.proveedor ALTER COLUMN id_proveedor DROP DEFAULT;
       public          postgres    false    217    218    218                      0    82103    almacen 
   TABLE DATA           b   COPY public.almacen (id_almacen, direccion_almacen, telefono, responsable, capacidad) FROM stdin;
    public          postgres    false    212   �<                  0    82110    articulo 
   TABLE DATA           �   COPY public.articulo (id_articulo, nombre_articulo, descripcion_articulo, precio_unitario, id_categoria, id_almacen, estado_articulo) FROM stdin;
    public          postgres    false    214   =                 0    82095 	   categoria 
   TABLE DATA           U   COPY public.categoria (id_categoria, nombre_categoria, estado_categoria) FROM stdin;
    public          postgres    false    210   7>       "          0    90286    empleado 
   TABLE DATA           �   COPY public.empleado (id_empleado, nombre, apellido_paterno, apellido_materno, correo_empleado, estado_empleado, password, id_oficina) FROM stdin;
    public          postgres    false    216   }>       &          0    90307    oficina 
   TABLE DATA           �   COPY public.oficina (id_oficina, nombre_oficina, descripcion_oficina, ubicacion_oficina, telefono_oficina, estado_oficina) FROM stdin;
    public          postgres    false    220   0?       $          0    90294 	   proveedor 
   TABLE DATA           �   COPY public.proveedor (id_proveedor, nombre_proveedor, direccion_proveedor, correo_proveedor, id_almacen, estado_proveedor) FROM stdin;
    public          postgres    false    218   �?       3           0    0    Almacen_id_almacen_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public."Almacen_id_almacen_seq"', 1, true);
          public          postgres    false    211            4           0    0    Articulo_id_articulo_seq    SEQUENCE SET     I   SELECT pg_catalog.setval('public."Articulo_id_articulo_seq"', 12, true);
          public          postgres    false    213            5           0    0    Categoria_id_categoria_seq    SEQUENCE SET     J   SELECT pg_catalog.setval('public."Categoria_id_categoria_seq"', 3, true);
          public          postgres    false    209            6           0    0    empleado_id_empleado_seq    SEQUENCE SET     F   SELECT pg_catalog.setval('public.empleado_id_empleado_seq', 7, true);
          public          postgres    false    215            7           0    0    oficina_id_oficina_seq    SEQUENCE SET     D   SELECT pg_catalog.setval('public.oficina_id_oficina_seq', 2, true);
          public          postgres    false    219            8           0    0    proveedor_id_proveedor_seq    SEQUENCE SET     H   SELECT pg_catalog.setval('public.proveedor_id_proveedor_seq', 3, true);
          public          postgres    false    217            �           2606    82108    almacen Almacen_pkey 
   CONSTRAINT     \   ALTER TABLE ONLY public.almacen
    ADD CONSTRAINT "Almacen_pkey" PRIMARY KEY (id_almacen);
 @   ALTER TABLE ONLY public.almacen DROP CONSTRAINT "Almacen_pkey";
       public            postgres    false    212            �           2606    82118    articulo Articulo_pkey 
   CONSTRAINT     _   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT "Articulo_pkey" PRIMARY KEY (id_articulo);
 B   ALTER TABLE ONLY public.articulo DROP CONSTRAINT "Articulo_pkey";
       public            postgres    false    214            �           2606    82101    categoria Categoria_pkey 
   CONSTRAINT     b   ALTER TABLE ONLY public.categoria
    ADD CONSTRAINT "Categoria_pkey" PRIMARY KEY (id_categoria);
 D   ALTER TABLE ONLY public.categoria DROP CONSTRAINT "Categoria_pkey";
       public            postgres    false    210            �           2606    90291    empleado empleado_pkey 
   CONSTRAINT     ]   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT empleado_pkey PRIMARY KEY (id_empleado);
 @   ALTER TABLE ONLY public.empleado DROP CONSTRAINT empleado_pkey;
       public            postgres    false    216            �           2606    90312    oficina oficina_pkey 
   CONSTRAINT     Z   ALTER TABLE ONLY public.oficina
    ADD CONSTRAINT oficina_pkey PRIMARY KEY (id_oficina);
 >   ALTER TABLE ONLY public.oficina DROP CONSTRAINT oficina_pkey;
       public            postgres    false    220            �           2606    90299    proveedor proveedor_pkey 
   CONSTRAINT     `   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT proveedor_pkey PRIMARY KEY (id_proveedor);
 B   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT proveedor_pkey;
       public            postgres    false    218            �           2606    82124    articulo fk_almacen    FK CONSTRAINT        ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 =   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_almacen;
       public          postgres    false    214    3203    212            �           2606    90300    proveedor fk_almacen    FK CONSTRAINT     �   ALTER TABLE ONLY public.proveedor
    ADD CONSTRAINT fk_almacen FOREIGN KEY (id_almacen) REFERENCES public.almacen(id_almacen);
 >   ALTER TABLE ONLY public.proveedor DROP CONSTRAINT fk_almacen;
       public          postgres    false    3203    212    218            �           2606    82119    articulo fk_categoria    FK CONSTRAINT     �   ALTER TABLE ONLY public.articulo
    ADD CONSTRAINT fk_categoria FOREIGN KEY (id_categoria) REFERENCES public.categoria(id_categoria);
 ?   ALTER TABLE ONLY public.articulo DROP CONSTRAINT fk_categoria;
       public          postgres    false    210    3201    214            �           2606    90314    empleado fk_oficina    FK CONSTRAINT     �   ALTER TABLE ONLY public.empleado
    ADD CONSTRAINT fk_oficina FOREIGN KEY (id_oficina) REFERENCES public.oficina(id_oficina) NOT VALID;
 =   ALTER TABLE ONLY public.empleado DROP CONSTRAINT fk_oficina;
       public          postgres    false    216    3211    220               B   x�3�tN��IUp����SH�+)JU��KO,�T�TH���,K,�4426153�����410������ #�j            x�eQ9r� ��W�\����z��&Μ�8$��J�z#��*�H�覛��x'��馠#��FQ�-��KM92T5���W��-hKl5��d�>��7�XSG�s����T�J�`��HǄ�t)mQ���-q~�׆a�����־ӎ��㎒�)�O]�&��w�MR.�坌!fg��yX�u��d�e�%^Ҥq�DH);5�b�Z9��n�#�<�w?��V��`�hD�Q��������OB���1h�4PpUqBp����t�)��OA}=	!~��         6   x�3��M,JNL�/J-�4�2����J,VHIU(H,H�
q�$d&��c���� ��X      "   �   x�U�M�0����Spb���c��h�elkZ�m�	�b0��ɛy��8S���Z΄ˠ"��m�&Y7ړu�
���;HQ��.�T�ّ"�ZGP!F�48�l%�Ţ����c��91u�.v��	ڤlL�L~����;�l�'�?�ӻ�R�~�JQ      &   |   x�}�K
�0D��)t�Ҙ��]��[
�9~�M7��潙�l��ðr�J�rr��rU���69Н<�9��',)��X���w��F�a�f��3x?�R�遟��?o�KJ��v=�      $   o   x�u�1�0D�z}�=A$�� u�����f�����C�D�i��D�bt���*�С�:^ڐ��̝v�Δ�I�N��Rmo˳Ӈ@�7���������1��SaC�;8     