import tkinter as tk
from tkinter import ttk
from datetime import datetime
import random
from tkinter import filedialog
import os

def ask_directory():
    # Abre el cuadro de diálogo para seleccionar un directorio y retorna la ruta seleccionada
    directory = filedialog.askdirectory()
    return directory

# Variable global para almacenar el nombre del producto
def plural_a_singular(palabra):
    # Maneja algunos casos especiales
    if palabra.endswith("s"):
        if palabra.endswith("es"):
            return palabra[:-2]  # Elimina "es" al final
        elif palabra.endswith("ces"):
            return palabra[:-3] + "z"  # Cambia "ces" por "z"
        elif palabra.endswith("des"):
            return palabra[:-2]  # Elimina "es" al final
        elif palabra.endswith("res"):
            return palabra[:-1]  # Elimina "s" al final
        else:
            return palabra[:-1]  # Elimina "s" al final
    else:
        return palabra  # La palabra ya es singular


def extraer_texto_derecha_del_punto(texto):

    partes = texto.split('.', 1)  # Dividir el texto en dos partes máximo, utilizando el punto como delimitador
    if len(partes) == 2:  # Verificar si se encontró al menos un punto en el texto
        return ":"+partes[1]  # Devolver la parte a la derecha del primer punto
    else:
        return ''  # Si no se encuentra ningún punto, devolver una cadena vacía

def obtener_value_laravel(tipo_sql):
    # Diccionario de mapeo de tipos de datos SQL a sinónimos de Laravel
    mapeo_tipos_datos = {
        'INT': '1',
        'INTEGER': '1',
        'SMALLINT': '1',
        'TINYINT': 'tinyInteger',
        'MEDIUMINT': 'mediumInteger',
        'BIGINT': 'bigInteger',
        'DECIMAL': '1.5',
        'NUMERIC': '1.5',
        'FLOAT': 'float',
        'DOUBLE': 'double',
        'REAL': 'real',
        'CHAR': 'char',
        'VARCHAR': 'hola',
        'TEXT': 'text',
        'DATE': '2020-12-12',
        'TIME': 'time',
        'DATETIME': 'dateTime',
        'TIMESTAMP': 'timestamp',
        'YEAR': 'year',
        'BOOL': 'boolean',
        'BOOLEAN': 'boolean',
        'BIT': 'bit',
        'BINARY': 'binary',
        'VARBINARY': 'varbinary',
        'BLOB': 'blob',
        'ENUM': 'enum',
        'SET': 'set',
        # Agrega más tipos de datos según tus necesidades
    }

    tipo_sql_upper = tipo_sql.upper()
    sinonimo_laravel = mapeo_tipos_datos.get(tipo_sql_upper, None)

    return sinonimo_laravel

def obtener_sinonimo_laravel(tipo_sql):
    # Diccionario de mapeo de tipos de datos SQL a sinónimos de Laravel
    mapeo_tipos_datos = {
        'INT': 'integer',
        'INTEGER': 'integer',
        'SMALLINT': 'integer',
        'TINYINT': 'tinyInteger',
        'MEDIUMINT': 'mediumInteger',
        'BIGINT': 'bigInteger',
        'DECIMAL': 'decimal',
        'NUMERIC': 'decimal',
        'FLOAT': 'float',
        'DOUBLE': 'double',
        'REAL': 'real',
        'CHAR': 'char',
        'VARCHAR': 'string',
        'TEXT': 'text',
        'DATE': 'date',
        'TIME': 'time',
        'DATETIME': 'dateTime',
        'TIMESTAMP': 'timestamp',
        'YEAR': 'year',
        'BOOL': 'boolean',
        'BOOLEAN': 'boolean',
        'BIT': 'bit',
        'BINARY': 'binary',
        'VARBINARY': 'varbinary',
        'BLOB': 'blob',
        'ENUM': 'enum',
        'SET': 'set',
        # Agrega más tipos de datos según tus necesidades
    }

    tipo_sql_upper = tipo_sql.upper()
    sinonimo_laravel = mapeo_tipos_datos.get(tipo_sql_upper, None)

    return sinonimo_laravel

def obtener_fecha_con_numero_aleatorio():
    # Obtener la fecha actual
    fecha_actual = datetime.now()

    # Generar un número aleatorio de 6 cifras
    numero_aleatorio = random.randint(100000, 999999)

    # Formatear la fecha como yyyy_mm_dd y concatenar el número aleatorio
    fecha_formateada = fecha_actual.strftime("%Y_%m_%d") + f"_{numero_aleatorio}"

    return fecha_formateada

def obtener_nombre_producto(input_file):
    with open(input_file, 'r') as f:
        # Leer la primera línea del archivo y eliminar espacios en blanco
        nombre_producto = f.readline().strip()
    return nombre_producto

def generar_blade_php(input_file, output_file):
    # Lista para almacenar todos los intervalos
    intervalos = []

    # Abrir el archivo de entrada
    with open(input_file, 'r') as f:
        # Leer las líneas del archivo
        lineas = f.readlines()[1:]  # Ignorar la primera línea

        # Procesar cada línea para obtener los intervalos
        for linea in lineas:
            intervalo = linea.strip().split(';')
            intervalos.append(intervalo)

    # Abrir el archivo de salida para escritura
    with open(output_file, 'w') as f:
        # Escribir la cabecera del archivo .blade.php
        f.write("@extends('adminlte::page')\n\n")
        f.write("@section('title', 'Lista de " + obtener_nombre_producto(input_file) + "')\n\n")
        f.write("@section('content_header')\n")
        f.write("\t<h1 class='m-0 text-dark'>Lista " + obtener_nombre_producto(input_file) + "</h1>\n")  # Usar el nombre del producto
        f.write("@stop\n\n")
        f.write("@section('content')\n")
        f.write("\t<table class='table table-bordered text-black'>\n")
        f.write("\t\t<tr>\n")
        
        # Escribir los encabezados de las columnas
        for intervalo in intervalos:
            f.write("\t\t\t<th>" + intervalo[0] + "</th>\n")
        
        f.write("\t\t\t<th>Opciones</th>\n")
        f.write("\t\t</tr>\n")
        f.write("\t\t@foreach ($" + obtener_nombre_producto(input_file).lower() + " as $" + plural_a_singular(obtener_nombre_producto(input_file).lower()) + ")\n")
        f.write("\t\t\t<tr>\n")
        
        # Escribir los datos de cada producto
        for intervalo in intervalos:
            f.write("\t\t\t\t<td> {{$" + plural_a_singular(obtener_nombre_producto(input_file).lower()) + "->" + intervalo[0].lower() + "}} </td>\n")
        
        # Escribir la parte de opciones
        f.write("\t\t\t\t<td>\n")#['producto' => $producto->noreg]
        for intervalo in intervalos:
            if intervalo[3] == "True":
                f.write("\t\t\t\t\t<a href=\"{{route('" + obtener_nombre_producto(input_file).lower() + ".edit',['"+plural_a_singular(obtener_nombre_producto(input_file).lower())+"' => $" + plural_a_singular(obtener_nombre_producto(input_file).lower()) + "->"+intervalo[0].lower()+"])}}\" class=\"btn btn-warning \">Editar</a>\n")
                f.write("\t\t\t\t\t<form action=\"{{route('" + obtener_nombre_producto(input_file).lower() + ".destroy',['"+plural_a_singular(obtener_nombre_producto(input_file).lower())+"' => $" + plural_a_singular(obtener_nombre_producto(input_file).lower()) + "->"+intervalo[0].lower()+"])}}\" class=\"d-inline\" method=\"POST\">\n")
        f.write("\t\t\t\t\t\t@csrf\n")
        f.write("\t\t\t\t\t\t@method('DELETE')\n")
        f.write("\t\t\t\t\t\t<button type=\"submit\" class=\"btn btn-danger\">Eliminar</button>\n")
        f.write("\t\t\t\t\t</form>\n")
        f.write("\t\t\t\t</td>\n")
        
        f.write("\t\t\t</tr>\n")
        f.write("\t\t@endforeach\n")
        f.write("\t</table>\n")
        f.write("\t<div>{{ $" + obtener_nombre_producto(input_file).lower() + "->links() }}</div>\n")
        f.write("@stop")

    print("Archivo generado exitosamente.")

def generar_registro_productos(input_file,output_file):
    # Lista para almacenar todos los intervalos
    intervalos = []

    # Abrir el archivo de entrada
    with open(input_file, 'r') as f:
        # Leer las líneas del archivo
        lineas = f.readlines()[1:]  # Ignorar la primera línea

        # Procesar cada línea para obtener los intervalos
        for linea in lineas:
            intervalo = linea.strip().split(';')
            intervalos.append(intervalo)
    
    # Abrir el archivo de salida para escritura
    with open(output_file, 'w') as f:
        # Escribir la cabecera del archivo .blade.php
        f.write("@extends('adminlte::page')\n\n")
        f.write("@section('title', 'Registro de " + obtener_nombre_producto(input_file) + "')\n\n")  # Usar el nombre del producto
        f.write("@section('content_header')\n")
        f.write("\t<h1 class='m-0 text-dark'>Registrar " + obtener_nombre_producto(input_file) + "</h1>\n")  # Usar el nombre del producto
        f.write("@stop\n\n")
        f.write("@section('content')\n")
        f.write("\t@if ($errors->any())\n")
        f.write("\t\t<div class='alert alert-danger'>\n")
        f.write("\t\t\t<strong>Hubo errores en los datos</strong>\n")
        f.write("\t\t\t<ul>\n")
        f.write("\t\t\t\t@foreach ($errors->all() as $error)\n")
        f.write("\t\t\t\t\t<li>{{$error}}</li>\n")
        f.write("\t\t\t\t@endforeach\n")
        f.write("\t\t\t</ul>\n")
        f.write("\t\t</div>\n")
        f.write("\t@endif\n\n")
        f.write("\t@if (Session::get('success'))\n")
        f.write("\t\t<div class='alert alert-success mt-2'>\n")
        f.write("\t\t\t<strong>{{Session::get('success')}}</strong>\n")
        f.write("\t\t</div>\n")
        f.write("\t@endif\n\n")
        f.write("\t<form action=\"{{route('" + obtener_nombre_producto(input_file).lower() + ".store')}}\" method=\"POST\" autocomplete=\"off\">\n")
        f.write("\t\t@csrf\n")
        
        for intervalo in intervalos:
            if intervalo[3] == "False":
                f.write("\t\t<div class=\"row\">\n")
                f.write("\t\t\t<x-adminlte-input name=\"" + intervalo[0].lower() + "\" label=\"" + intervalo[0].lower() + "\" placeholder=\"" + intervalo[0].lower() + " del " + obtener_nombre_producto(input_file) + "\" fgroup-class=\"col-md-6\" disable-feedback value='"+ obtener_value_laravel(intervalo[1])+"'/>\n")  # Usar el nombre del producto
                f.write("\t\t</div>\n")
        f.write("\t\t<x-adminlte-button class=\"btn-flat\" type=\"submit\" label=\"Registrar\" theme=\"success\" icon=\"fas fa-lg fa-save\"/>\n")
        f.write("\t</form>\n")
        f.write("@stop")

    print("Archivo generado exitosamente.")

def generar_editar_productos(input_file,output_file):
    # Lista para almacenar todos los intervalos
    intervalos = []

    # Abrir el archivo de entrada
    with open(input_file, 'r') as f:
        # Leer las líneas del archivo
        lineas = f.readlines()[1:]  # Ignorar la primera línea

        # Procesar cada línea para obtener los intervalos
        for linea in lineas:
            intervalo = linea.strip().split(';')
            intervalos.append(intervalo)
    
    # Abrir el archivo de salida para escritura
    with open(output_file, 'w') as f:
        # Escribir la cabecera del archivo .blade.php
        f.write("@extends('adminlte::page')\n\n")
        f.write("@section('title', 'Editar " + obtener_nombre_producto(input_file) + "')\n\n")  # Usar el nombre del producto
        f.write("@section('content_header')\n")
        f.write("\t<h1 class='m-0 text-dark'>Editar " + obtener_nombre_producto(input_file)+ "</h1>\n")  # Usar el nombre del producto
        f.write("@stop\n\n")
        f.write("@section('content')\n")
        f.write("\t@if ($errors->any())\n")
        f.write("\t\t<div class='alert alert-danger'>\n")
        f.write("\t\t\t<strong>Hubo errores en los datos</strong>\n")
        f.write("\t\t\t<ul>\n")
        f.write("\t\t\t\t@foreach ($errors->all() as $error)\n")
        f.write("\t\t\t\t\t<li>{{$error}}</li>\n")
        f.write("\t\t\t\t@endforeach\n")
        f.write("\t\t\t</ul>\n")
        f.write("\t\t</div>\n")
        f.write("\t@endif\n\n")
        f.write("\t@if (Session::get('success'))\n")
        f.write("\t\t<div class='alert alert-success mt-2'>\n")
        f.write("\t\t\t<strong>{{Session::get('success')}}</strong>\n")
        f.write("\t\t</div>\n")
        f.write("\t@endif\n\n")
        f.write("\t<form action=\"{{route('" + obtener_nombre_producto(input_file).lower() + ".update',$" + plural_a_singular(obtener_nombre_producto(input_file).lower()) + ")}}\" method=\"POST\" autocomplete=\"off\">\n")
        f.write("\t\t@csrf\n")
        f.write("\t\t@method('PUT')\n")
        for intervalo in intervalos:
            if intervalo[3] == "False":  
                f.write("\t\t<div class=\"row\">\n")
                f.write("\t\t\t<x-adminlte-input name=\"" + intervalo[0].lower() + "\" label=\"" + intervalo[0].lower() + "\" placeholder=\"" + intervalo[0].lower() + " del " + obtener_nombre_producto(input_file) + "\" fgroup-class=\"col-md-6\" disable-feedback value=\"{{$" + plural_a_singular(obtener_nombre_producto(input_file).lower()) + "->" + intervalo[0].lower() + "}}\"/>\n")  # Usar el nombre del producto
                f.write("\t\t</div>\n")
        f.write("\t\t<x-adminlte-button class=\"btn-flat\" type=\"submit\" label=\"Actualizar\" theme=\"success\" icon=\"fas fa-lg fa-save\"/>\n")
        f.write("\t</form>\n")
        f.write("@stop")

    print("Archivo generado exitosamente.")

def generar_modelo_productos(input_file,output_file):
    # Lista para almacenar todos los intervalos
    intervalos = []

    # Abrir el archivo de entrada
    with open(input_file, 'r') as f:
        # Leer las líneas del archivo
        lineas = f.readlines()[1:]  # Ignorar la primera línea

        # Procesar cada línea para obtener los intervalos
        for linea in lineas:
            intervalo = linea.strip().split(';')
            intervalos.append(intervalo)
    
    # Abrir el archivo de salida para escritura
    with open(output_file, 'w') as f:
        # Escribir la cabecera del archivo .blade.php
        f.write("<?php\n\n")
        f.write("namespace App\\Models;\n\n")
        f.write("use Illuminate\\Database\\Eloquent\\Factories\\HasFactory;\n")
        f.write("use Illuminate\\Database\\Eloquent\\Model;\n\n")
        f.write("class " + plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize() + " extends Model\n")
        f.write("{\n")
        f.write("\tuse HasFactory;\n\n")
        for intervalo in intervalos:
            if intervalo[3] == "True":
                f.write("\tprotected $primaryKey = '"+intervalo[0].lower()+"';\n")
        f.write("\tprotected $fillable = [")
        for i, intervalo in enumerate(intervalos):
            if i > 0:
                f.write(", ")  # Agregar coma si no es el primer elemento
            f.write("'" + intervalo[0].lower() + "'")
        f.write("];\n")
        f.write("}\n")

    print("Archivo generado exitosamente.")

def generar_controller_productos(input_file,output_file):
    # Lista para almacenar todos los intervalos
    intervalos = []

    # Abrir el archivo de entrada
    with open(input_file, 'r') as f:
        # Leer las líneas del archivo
        lineas = f.readlines()[1:]  # Ignorar la primera línea

        # Procesar cada línea para obtener los intervalos
        for linea in lineas:
            intervalo = linea.strip().split(';')
            intervalos.append(intervalo)
    
    # Abrir el archivo de salida para escritura
    with open(output_file, 'w') as f:
        # Escribir la cabecera del archivo .blade.php
        f.write("<?php\n\n")
        f.write("namespace App\\Http\\Controllers;\n\n")
        f.write("use App\\Models\\" + plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize() + ";\n")
        f.write("use Illuminate\\Http\\Request;\n\n")
        f.write("class " + plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize() + "Controller extends Controller\n")
        f.write("{\n")
        f.write("\t/**\n")
        f.write("\t * Display a listing of the resource.\n")
        f.write("\t */\n")
        f.write("\tpublic function index()\n")
        f.write("\t{\n")
        f.write("\t\t//\n")
        f.write("\t\t//return 'Estoy en el indice de productos';\n")
        f.write("\t\t//$productos=" + plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize() + "::all();\n")
        f.write("\t\t//$productos=" + plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize() + "::latest()->paginate(6);\n")
        for i, intervalo in enumerate(intervalos):
            if intervalo[3] == "True":
                f.write("\t\t$productos=" + plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize() + "::orderBy('"+intervalo[0].lower()+"', 'asc')->paginate(6);\n")
        f.write("\t\treturn view('"+obtener_nombre_producto(input_file).lower()+".listar',\n")
        f.write("\t\tcompact('"+obtener_nombre_producto(input_file).lower()+"'));  // ['"+obtener_nombre_producto(input_file).lower()+"' =>$"+obtener_nombre_producto(input_file).lower()+"]\n")
        f.write("\t}\n\n")
        f.write("\t/**\n")
        f.write("\t * Show the form for creating a new resource.\n")
        f.write("\t */\n")
        f.write("\tpublic function create()\n")
        f.write("\t{\n")
        f.write("\t\t// ESTO MUESTRA LA VISTA DE CREACION\n")
        f.write("\t\treturn view('"+obtener_nombre_producto(input_file).lower()+".registrar');\n")
        f.write("\t}\n\n")
        f.write("\t/**\n")
        f.write("\t * Store a newly created resource in storage.\n")
        f.write("\t */\n")
        f.write("\tpublic function store(Request $request)\n")
        f.write("\t{\n")
        f.write("\t\t// CON LA VISTA Y SUS DATOS SE GUARDA LA INFO DB\n")
        f.write("\t\t//dd($request->all());\n\n")
        f.write("\t\t$request->validate([\n")
        for i, intervalo in enumerate(intervalos):  # Agregar coma si no es el último elemento
            if intervalo[3] != "True":
                if intervalo[2] == "":
                    f.write("\t\t\t'"+intervalo[0].lower()+"' => 'required|" + obtener_sinonimo_laravel(intervalo[1]) + "'")
                else:
                    if obtener_sinonimo_laravel(intervalo[1]) == 'decimal':
                        f.write("\t\t\t'"+intervalo[0].lower()+"' => ['required','numeric','regex:/^\\d{1,"+intervalo[2].replace('.','}(\\.\\d{1,')+ "})?$/']")
                    else:
                        f.write("\t\t\t'"+intervalo[0].lower()+"' => 'required|" + obtener_sinonimo_laravel(intervalo[1])+"|max:"+intervalo[2]+"'")        

                # Agregar coma si no es el último elemento
                if i < len(intervalos) - 1:
                    f.write(",\n") 
        f.write("\n\t\t]);\n\n")
        f.write("\t\t"+plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize()+"::create($request->all());\n")
        f.write("\t\treturn redirect()->route('"+obtener_nombre_producto(input_file).lower()+".create')\n")
        f.write("\t\t->with('success','"+obtener_nombre_producto(input_file)+" Registrado con exito...');\n")
        f.write("\t}\n\n")
        f.write("\t/**\n")
        f.write("\t * Display the specified resource.\n")
        f.write("\t */\n")
        f.write("\tpublic function show("+plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize()+" $"+plural_a_singular(obtener_nombre_producto(input_file).lower())+")\n")
        f.write("\t{\n")
        f.write("\t\t//\n")
        f.write("\t}\n\n")
        f.write("\t/**\n")
        f.write("\t * Show the form for editing the specified resource.\n")
        f.write("\t */\n")
        f.write("\tpublic function edit("+plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize()+" $"+plural_a_singular(obtener_nombre_producto(input_file).lower())+")\n")
        f.write("\t{\n")
        f.write("\t\t//dd($"+obtener_nombre_producto(input_file).lower()+");\n")
        f.write("\t\treturn view('"+obtener_nombre_producto(input_file).lower()+".editar',['"+plural_a_singular(obtener_nombre_producto(input_file).lower())+"'=>$"+plural_a_singular(obtener_nombre_producto(input_file).lower())+"]);\n")
        f.write("\t}\n\n")
        f.write("\t/**\n")
        f.write("\t * Update the specified resource in storage.\n")
        f.write("\t */\n")
        f.write("\tpublic function update(Request $request, "+plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize()+" $"+plural_a_singular(obtener_nombre_producto(input_file).lower())+")\n")
        f.write("\t{\n")
        f.write("\t\t//\n")
        f.write("\t\t//dd($"+obtener_nombre_producto(input_file).lower()+");\n")
        f.write("\t\t$request->validate([\n")
        for i, intervalo in enumerate(intervalos):  # Agregar coma si no es el último elemento
            if intervalo[3] != "True":
                if intervalo[2] == "":
                    f.write("\t\t\t'"+intervalo[0].lower()+"' => 'required|" + obtener_sinonimo_laravel(intervalo[1]) + "'")
                else:
                    if obtener_sinonimo_laravel(intervalo[1]) == 'decimal':
                        f.write("\t\t\t'"+intervalo[0].lower()+"' => ['required','numeric','regex:/^\\d{1,"+intervalo[2].replace('.','}(\\.\\d{1,')+ "})?$/']")
                    else:
                        f.write("\t\t\t'"+intervalo[0].lower()+"' => 'required|" + obtener_sinonimo_laravel(intervalo[1])+"|max:"+ intervalo[2]+"'")        

                # Agregar coma si no es el último elemento
                if i < len(intervalos) - 1:
                    f.write(",\n")        
        f.write("\n\t\t]);\n\n")
        f.write("\t\t$"+plural_a_singular(obtener_nombre_producto(input_file).lower())+"->update($request->all());\n")
        f.write("\t\treturn redirect()->route('"+obtener_nombre_producto(input_file).lower()+".index')\n")
        f.write("\t\t->with('success','"+obtener_nombre_producto(input_file)+" Editar con exito...');\n")
        f.write("\t}\n\n")
        f.write("\t/**\n")
        f.write("\t * Remove the specified resource from storage.\n")
        f.write("\t */\n")
        f.write("\tpublic function destroy("+plural_a_singular(obtener_nombre_producto(input_file).lower()).capitalize()+" $"+plural_a_singular(obtener_nombre_producto(input_file).lower())+")\n")
        f.write("\t{\n")
        f.write("\t\t$"+plural_a_singular(obtener_nombre_producto(input_file).lower())+"->delete();\n")
        f.write("\t\treturn redirect()->route('"+obtener_nombre_producto(input_file).lower()+".index');\n")
        f.write("\t\t//->with('success','"+obtener_nombre_producto(input_file)+" Registrado con exito...');\n")
        f.write("\t\t//dd($"+plural_a_singular(obtener_nombre_producto(input_file).lower())+");\n")
        f.write("\t}\n")
        f.write("}\n")

    print("Archivo generado exitosamente.")

def generar_migration_productos(input_file,output_file):
    # Lista para almacenar todos los intervalos
    intervalos = []

    # Abrir el archivo de entrada
    with open(input_file, 'r') as f:
        # Leer las líneas del archivo
        lineas = f.readlines()[1:]  # Ignorar la primera línea

        # Procesar cada línea para obtener los intervalos
        for linea in lineas:
            intervalo = linea.strip().split(';')
            intervalos.append(intervalo)
    
    # Abrir el archivo de salida para escritura
    with open(output_file, 'w') as f:
        # Escribir la cabecera del archivo .blade.php
        f.write("<?php\n\n")
        f.write("use Illuminate\\Database\\Migrations\\Migration;\n")
        f.write("use Illuminate\\Database\\Schema\\Blueprint;\n")
        f.write("use Illuminate\\Support\\Facades\\Schema;\n\n")
        f.write("return new class extends Migration\n")
        f.write("{\n")
        f.write("\t/**\n")
        f.write("\t * Run the migrations.\n")
        f.write("\t */\n")
        f.write("\tpublic function up(): void\n")
        f.write("\t{\n")
        f.write("\t\tSchema::create('"+obtener_nombre_producto(input_file).lower()+"', function (Blueprint $table) {\n")
        for i, intervalo in enumerate(intervalos):
            if intervalo[3] == "True":
                f.write("\t\t\t$table->id('"+intervalo[0].lower()+"');\n")
            else:
                if intervalo[2] == "":
                    f.write("\t\t\t$table->"+obtener_sinonimo_laravel(intervalo[1])+"('"+intervalo[0].lower()+"');\n")
                else:
                    f.write("\t\t\t$table->"+obtener_sinonimo_laravel(intervalo[1])+"('"+intervalo[0].lower()+"'," + intervalo[2].replace('.',',') + ");\n")
        f.write("\t\t\t$table->timestamps();\n")
        f.write("\t\t});\n")
        f.write("\t}\n\n")
        f.write("\t/**\n")
        f.write("\t * Reverse the migrations.\n")
        f.write("\t */\n")
        f.write("\tpublic function down(): void\n")
        f.write("\t{\n")
        f.write("\t\tSchema::dropIfExists('"+obtener_nombre_producto(input_file).lower()+"');\n")
        f.write("\t}\n")
        f.write("};\n")



    print("Archivo generado exitosamente.")

def procesar_ddl():
    global variables, primer_checkbox_marcado, nombre_entries, tipo_dropdowns, tamano_entries, primary_key_vars
    ddl_texto = ddl_text.get("2.0", "end-1c")  # Ignorar la primera línea del texto DDL
    lineas = ddl_texto.split('\n')

    variables = []
    nombre_entries = []
    tipo_dropdowns = []
    tamano_entries = []
    primary_key_vars = []

    for linea in lineas[:-2]:  # Ignorar las últimas dos líneas
        if '(' in linea or ')' in linea:
            partes = linea.strip().split()
            if len(partes) > 1:
                variable = partes[0]
                tipo = partes[1]
                tamano = ""
                if "(" in tipo and ")" in tipo:
                    tamano = tipo[tipo.find("(") + 1:tipo.find(")")]
                    tipo = tipo[:tipo.find("(")].lower()
                    if "," in tamano:  # Reemplazar la coma por punto si es un número decimal
                        tamano = tamano.replace(",", ".")
                variables.append((variable, tipo, tamano))
        else:
            last_comma_index = linea.rfind(',')
            if last_comma_index != -1:
                partes = linea[:last_comma_index].strip().split()
                if len(partes) > 1:
                    variable = partes[0]
                    tipo = partes[1].split()[0]  # Obtener solo la primera palabra del tipo
                    variables.append((variable, tipo, ""))
            else:
                partes = linea.strip().split()
                if len(partes) > 1:
                    variables.append((partes[0], partes[1], ""))

    # Crear una nueva ventana para mostrar las variables
    ventana_variables = tk.Toplevel(root)
    ventana_variables.title("Variables del DDL")

    # Crear un frame dentro de la nueva ventana para colocar los widgets
    frame_variables = ttk.Frame(ventana_variables)
    frame_variables.pack(fill="both", expand=True)

    scrollbar_frame = tk.Scrollbar(frame_variables, orient="vertical")
    scrollbar_frame.pack(side="right", fill="y")

    canvas = tk.Canvas(frame_variables, yscrollcommand=scrollbar_frame.set)
    canvas.pack(side="left", fill="both", expand=True)

    scrollbar_frame.config(command=canvas.yview)

    frame_scrollable = ttk.Frame(canvas)
    canvas.create_window((0, 0), window=frame_scrollable, anchor="nw")

    def on_frame_configure(event):
        canvas.configure(scrollregion=canvas.bbox("all"))

    frame_scrollable.bind("<Configure>", on_frame_configure)

    primer_checkbox_marcado = False  # Variable para rastrear si el primer checkbox ha sido marcado

    for i, (variable, tipo, tamano) in enumerate(variables):
        if not primer_checkbox_marcado:  # Marcar solo el primer checkbox
            primary_key = tk.BooleanVar(value=True)
            primer_checkbox_marcado = True
        else:
            primary_key = tk.BooleanVar()
        primary_key_vars.append(primary_key)

        nombre_entry = ttk.Entry(frame_scrollable)
        nombre_entry.insert(0, variable)
        nombre_entry.grid(row=i, column=0)
        nombre_entries.append(nombre_entry)

        tipo_dropdown = ttk.Combobox(frame_scrollable, values=["int", "varchar", "char", "date", "datetime", "numeric", "smallint"]) # Puedes agregar más tipos según tu necesidad
        tipo_dropdown.insert(0, tipo)
        tipo_dropdown.grid(row=i, column=1)
        tipo_dropdowns.append(tipo_dropdown)

        tamano_entry = ttk.Entry(frame_scrollable)
        tamano_entry.insert(0, tamano)
        tamano_entry.grid(row=i, column=2)
        tamano_entries.append(tamano_entry)

        primary_key_checkbox = tk.Checkbutton(frame_scrollable, text="Primary Key", variable=primary_key)
        primary_key_checkbox.grid(row=i, column=3)

    boton_guardar = tk.Button(ventana_variables, text="Guardar Cambios", command=guardar_cambios)
    boton_guardar.pack()


def agregar_controlador_y_ruta(nombre_producto, directory):
    nombre_controlador = plural_a_singular(nombre_producto).capitalize() + "Controller"
    importacion = f"use App\\Http\\Controllers\\{nombre_controlador};\n"
    ruta_crud = f"Route::resource('/{nombre_producto}', {nombre_controlador}::class)->names('{nombre_producto}')->middleware('auth');\n"

    ruta_archivo = os.path.join(directory, 'routes', 'web.php')

    with open(ruta_archivo, 'r+') as file:
        lines = file.readlines()

        # Encuentra el último "use" en el archivo
        last_use_index = next((i for i, line in enumerate(lines) if line.startswith('use ') and ';' in line), None)

        # Agregar la importación después del último "use" si no está ya presente
        if last_use_index is not None and importacion not in lines:
            lines.insert(last_use_index + 1, importacion)

        # Revisar si la ruta CRUD ya está presente
        if ruta_crud not in lines:
            lines.append(ruta_crud)

        # Escribe el archivo con los cambios
        file.seek(0)
        file.writelines(lines)
        file.truncate()

    print(f"Controlador y ruta para {nombre_producto} añadidos al archivo {ruta_archivo}.")
def crear_carpeta_si_no_existe(path):
    if not os.path.exists(path):
        os.makedirs(path)
        print(f"La carpeta {path} fue creada.")
    else:
        print(f"La carpeta {path} ya existe.")

def guardar_cambios():
    ddl_texto = ddl_text.get("1.0", "2.0")  # Leer solo la primera línea del texto DDL
    primera_linea = ddl_texto.strip().split()
    tercera_palabra = ""
    if len(primera_linea) > 2:
        tercera_palabra = primera_linea[2]
    directory = ask_directory()
    if not directory:  # Si el usuario cancela, no hacer nada
        return
    with open("reporte.txt", "w") as file:
        
        file.write(f"{tercera_palabra}\n")  # Escribir la tercera palabra en la primera línea
        for i in range(len(variables)):
            variable = nombre_entries[i].get()
            tipo = tipo_dropdowns[i].get()
            tamano = tamano_entries[i].get()
            primary_key = primary_key_vars[i].get()
            file.write(f"{variable};{tipo};{tamano};{primary_key}\n")
            # Llamar a la función con el nombre de archivo apropiado
        # Obtener la lista de archivos y carpetas en el directorio
            
    contenido_directorio = os.listdir(directory)
    nombre_producto = obtener_nombre_producto("reporte.txt").lower()
    path_views = os.path.join(directory, 'resources', 'views', nombre_producto)
    agregar_controlador_y_ruta(nombre_producto, directory)
    # Crear la carpeta dentro de resources/views si no existe
    crear_carpeta_si_no_existe(path_views)



    generar_editar_productos("reporte.txt",f"{directory}/resources/views/{obtener_nombre_producto('reporte.txt').lower()}/editar.blade.php")
    # Llamar a la función con el nombre de archivo apropiado
    generar_registro_productos("reporte.txt",f"{directory}/resources/views/{obtener_nombre_producto('reporte.txt').lower()}/registrar.blade.php")
    # Llamar a la función con los nombres de archivo apropiados
    generar_blade_php("reporte.txt", f"{directory}/resources/views/{obtener_nombre_producto('reporte.txt').lower()}/listar.blade.php")

    generar_modelo_productos("reporte.txt",f"{directory}/app/Models/"+plural_a_singular(obtener_nombre_producto('reporte.txt').lower()).capitalize()+".php")
    generar_controller_productos("reporte.txt",f"{directory}/app/Http/Controllers/"+plural_a_singular(obtener_nombre_producto('reporte.txt').lower()).capitalize()+"Controller.php")
    generar_migration_productos("reporte.txt",f"{directory}/database/migrations/" + obtener_fecha_con_numero_aleatorio() + "_create_"+obtener_nombre_producto('reporte.txt').lower()+"_table.php")
    agregar_controlador_y_ruta('productos', directory)


root = tk.Tk()
root.title("Procesador de DDL")

ddl_label = tk.Label(root, text="Introduce el texto DDL:")
ddl_label.grid(row=0, column=0, sticky="w")

ddl_text = tk.Text(root, width=50, height=10)
ddl_text.grid(row=1, column=0, sticky="nsew")

procesar_button = tk.Button(root, text="Procesar", command=procesar_ddl)
procesar_button.grid(row=2, column=0)

root.mainloop()