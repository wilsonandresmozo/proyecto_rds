# Proyecto RDS - API REST Laravel 13

## Sistema de Gestión de Recursos Humanos

---

# Descripción

Este proyecto consiste en el desarrollo de una API REST utilizando **Laravel 13**, cuyo objetivo es administrar la información de empleados, cargos y funciones asignadas a cada cargo dentro de una organización.

La aplicación implementa autenticación mediante **Laravel Sanctum**, validación de datos, relaciones entre modelos, paginación, factories y seeders para generar información automáticamente.

Este proyecto fue desarrollado como evidencia de aprendizaje del programa **ADSO (Análisis y Desarrollo de Software)** del **SENA**.

---

# Objetivos

El sistema permite:

* Registrar usuarios.
* Iniciar sesión mediante autenticación con token.
* Cerrar sesión invalidando el token.
* Gestionar cargos.
* Gestionar empleados.
* Gestionar funciones de cada cargo.
* Validar toda la información recibida.
* Proteger los recursos mediante autenticación.
* Consultar la información utilizando paginación.

---

# Tecnologías utilizadas

* PHP 8.x
* Laravel 13
* MySQL 8
* Laravel Sanctum
* Composer
* Faker
* Git
* GitHub
* Git Bash
* cURL

---

# Arquitectura utilizada

El proyecto fue desarrollado siguiendo el patrón MVC (Modelo - Vista - Controlador) implementado por Laravel.

La API se encuentra organizada mediante:

* Models
* Controllers
* Routes
* Migrations
* Seeders
* Factories

---

# Requisitos

Antes de ejecutar el proyecto es necesario tener instalado:

* PHP 8.x
* Composer
* MySQL Server
* Git
* Git Bash

Verificar versiones:

```bash
php -v
composer -V
mysql --version
git --version
```

---

# Advertencia Importante

## Entorno oficial de pruebas

Este proyecto fue desarrollado, probado y validado utilizando:

* Git Bash
* cURL
* Laravel Artisan

Todos los ejemplos incluidos en este documento fueron ejecutados utilizando dicho entorno.

Aunque existen clientes HTTP como Postman, Insomnia o herramientas similares, la documentación oficial de este proyecto utiliza exclusivamente comandos **cURL**, por ser el entorno empleado durante el desarrollo y las pruebas.

En caso de utilizar herramientas diferentes, será responsabilidad del usuario configurar correctamente:

* Método HTTP.
* Headers.
* Authorization Bearer Token.
* Body JSON.
* Tipo de contenido (Content-Type).

Los ejemplos oficiales de consumo de la API son los incluidos en este documento.

---

# Instalación

## 1. Clonar el repositorio

```bash
git clone https://github.com/wilsonandresmozo/proyecto_rds.git
```

Ingresar al proyecto

```bash
cd proyecto_rds
```

---

## 2. Instalar dependencias

```bash
composer install
```
```bash
composer update

---

## 3. Copiar archivo de configuración

```bash
cp .env.example .env
```

---

## 4. Configurar la conexión con MySQL

Abrir el archivo `.env` y modificar:

```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=db_3066552
DB_USERNAME=root
DB_PASSWORD=
```

Modificar únicamente los valores correspondientes a su servidor MySQL.

---

## 5. Generar la llave de Laravel

```bash
php artisan key:generate
```

---

## 6. Crear la base de datos

Ingresar a MySQL

```bash
mysql -u root -p
```

Crear la base de datos

```sql
CREATE DATABASE db_3066552;
```

Salir

```sql
exit;
```

---

## 7. Ejecutar migraciones y seeders

```bash
php artisan migrate:fresh --seed
```

Este comando realizará automáticamente:

* Creación de todas las tablas.
* Ejecución de las migraciones.
* Inserción automática de información mediante Factories y Seeders.

Se generan automáticamente:

* 40 cargos.
* 200 funciones de cargo.
* 30 empleados.
* 1 usuario administrador.

---

# Usuario Administrador

Después de ejecutar los seeders se crea automáticamente un usuario administrador.

Correo electrónico

```
admin@test.com
```

Contraseña

```
password
```

Este usuario puede autenticarse inmediatamente utilizando el endpoint de Login.

---

# Ejecutar el servidor

```bash
php artisan serve
```
# Para detener el servidor
```bash
CTRL + C

El servidor iniciará en:

```
http://127.0.0.1:8000
```

---

# Flujo de autenticación

La autenticación se implementó utilizando **Laravel Sanctum**.

El flujo correcto para utilizar la API es el siguiente:

1. Registrar un usuario.
2. Iniciar sesión.
3. Obtener un token.
4. Enviar el token en cada petición protegida.
5. Cerrar sesión para invalidar el token.

Las únicas rutas públicas son:

* POST /api/register
* POST /api/login

Todas las demás rutas requieren autenticación mediante Bearer Token.

---

# Uso del Token

Después del Login la API devolverá un token similar a:

```json
{
    "message":"Inicio de sesión exitoso.",
    "token":"1|XXXXXXXXXXXXXXXXXXXXXXXXXXXX"
}
```

Guardar dicho token en una variable:

```bash
TOKEN="TOKEN_GENERADO"
```

Posteriormente podrá utilizarse así:

```bash
curl http://127.0.0.1:8000/api/empleados \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

---

# Estructura de la API

La API administra tres recursos principales:

* Cargos
* Empleados
* Funciones de Cargo

Además implementa:

* Registro de usuarios.
* Inicio de sesión.
* Cierre de sesión.

En la siguiente sección se documentan todos los endpoints disponibles, incluyendo ejemplos completos utilizando cURL.


# Documentación de Endpoints

## 1. Registro de Usuario

Permite crear un nuevo usuario para acceder a la API.

### Método

POST

### Endpoint

```
/api/register
```

### Requiere autenticación

No.

### Ejemplo

```bash
curl -X POST http://127.0.0.1:8000/api/register \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"name":"Wilson",
"email":"wilson@test.com",
"password":"123456",
"password_confirmation":"123456"
}'
```

### Respuesta esperada

```json
{
    "message":"Usuario registrado correctamente. Ahora inicie sesión."
}
```

Código HTTP

```
201 Created
```

---

# 2. Inicio de Sesión

Autentica un usuario y genera un token de acceso.

### Método

POST

### Endpoint

```
/api/login
```

### Requiere autenticación

No.

### Ejemplo

```bash
curl -X POST http://127.0.0.1:8000/api/login \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"email":"wilson@test.com",
"password":"123456"
}'
```

### Respuesta

```json
{
    "message":"Inicio de sesión exitoso.",
    "token":"1|XXXXXXXXXXXXXXXXXXXX"
}
```

Código HTTP

```
200 OK
```

---

# 3. Cerrar Sesión

Invalida el token actual.

### Método

POST

### Endpoint

```
/api/logout
```

### Requiere autenticación

Sí.

### Ejemplo

```bash
curl -X POST http://127.0.0.1:8000/api/logout \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

### Respuesta

```json
{
    "message":"Sesión cerrada correctamente."
}
```

Código HTTP

```
200 OK
```

---

# CRUD Cargos

## Listar cargos

Método

GET

Endpoint

```
/api/cargos
```

Autenticación

Sí.

Ejemplo

```bash
curl http://127.0.0.1:8000/api/cargos \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

Código HTTP

```
200 OK
```

---

## Consultar un cargo

Método

GET

```
/api/cargos/{id}
```

Ejemplo

```bash
curl http://127.0.0.1:8000/api/cargos/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

Código

```
200 OK
```

---

## Crear cargo

Método

POST

```
/api/cargos
```

Ejemplo

```bash
curl -X POST http://127.0.0.1:8000/api/cargos \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"nombre_cargo":"Analista",
"descripcion":"Analiza información"
}'
```

Código

```
201 Created
```

---

## Actualizar cargo

Método

PUT

```
/api/cargos/1
```

Ejemplo

```bash
curl -X PUT http://127.0.0.1:8000/api/cargos/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"nombre_cargo":"Analista Senior",
"descripcion":"Actualizado"
}'
```

Código

```
200 OK
```

---

## Eliminar cargo

Método

DELETE

```
/api/cargos/1
```

Ejemplo

```bash
curl -X DELETE http://127.0.0.1:8000/api/cargos/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

Código

```
200 OK
```

---

# CRUD Empleados

## Listar empleados

Método

GET

```
/api/empleados
```

Este endpoint devuelve los empleados paginados junto con la información del cargo asociado.

Ejemplo

```bash
curl http://127.0.0.1:8000/api/empleados \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

También es posible consultar páginas específicas:

```bash
curl http://127.0.0.1:8000/api/empleados?page=2 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

Código

```
200 OK
```

---

## Consultar empleado

GET

```
/api/empleados/1
```

```bash
curl http://127.0.0.1:8000/api/empleados/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

---

## Crear empleado

POST

```
/api/empleados
```

```bash
curl -X POST http://127.0.0.1:8000/api/empleados \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"nombres":"Juan",
"apellidos":"Pérez",
"fecha_nacimiento":"2000-05-12",
"fecha_ingreso":"2025-01-01",
"salario":2500000,
"estado":true,
"cargo_id":1
}'
```

Código

```
201 Created
```

---

## Actualizar empleado

PUT

```
/api/empleados/1
```

```bash
curl -X PUT http://127.0.0.1:8000/api/empleados/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"nombres":"Juan Carlos",
"apellidos":"Pérez",
"fecha_nacimiento":"2000-05-12",
"fecha_ingreso":"2025-01-01",
"salario":3000000,
"estado":true,
"cargo_id":2
}'
```

---

## Eliminar empleado

DELETE

```
/api/empleados/1
```

```bash
curl -X DELETE http://127.0.0.1:8000/api/empleados/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

---

# CRUD Funciones Cargo

## Listar funciones

GET

```
/api/funciones-cargo
```

```bash
curl http://127.0.0.1:8000/api/funciones-cargo \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

---

## Consultar función

GET

```
/api/funciones-cargo/1
```

```bash
curl http://127.0.0.1:8000/api/funciones-cargo/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

---

## Crear función

POST

```
/api/funciones-cargo
```

```bash
curl -X POST http://127.0.0.1:8000/api/funciones-cargo \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"descripcion_funcion":"Realizar auditorías",
"estado":true,
"cargo_id":1
}'
```

---

## Actualizar función

PUT

```
/api/funciones-cargo/1
```

```bash
curl -X PUT http://127.0.0.1:8000/api/funciones-cargo/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json" \
-H "Content-Type: application/json" \
-d '{
"descripcion_funcion":"Auditorías internas",
"estado":true,
"cargo_id":1
}'
```

---

## Eliminar función

DELETE

```
/api/funciones-cargo/1
```

```bash
curl -X DELETE http://127.0.0.1:8000/api/funciones-cargo/1 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

Todos los endpoints anteriores requieren un **Bearer Token** válido obtenido mediante el endpoint de Login, excepto los endpoints **/api/register** y **/api/login**, que son públicos.


# Validaciones Implementadas

La API implementa validaciones utilizando el método `validate()` de Laravel.

## Validaciones para Empleados

* nombres: requerido, texto, máximo 255 caracteres.
* apellidos: requerido, texto, máximo 255 caracteres.
* fecha_nacimiento: requerido, tipo fecha.
* fecha_ingreso: requerido, tipo fecha.
* salario: requerido, numérico y mayor o igual a cero.
* estado: requerido, booleano.
* cargo_id: requerido y debe existir en la tabla `cargos`.

Estas validaciones se ejecutan tanto en el método **store()** como en **update()**, evitando el almacenamiento de información inválida.

---

# Relaciones entre Modelos

La aplicación utiliza relaciones Eloquent para representar la estructura de la base de datos.

## Cargo

Un cargo puede tener muchos empleados.

```text
Cargo
   │
   ├────────────► Empleado
```

Relación:

```php
hasMany()
```

---

Un cargo puede tener muchas funciones.

```text
Cargo
   │
   ├────────────► FuncionCargo
```

Relación:

```php
hasMany()
```

---

## Empleado

Cada empleado pertenece a un único cargo.

```php
belongsTo()
```

---

## Función de Cargo

Cada función pertenece a un único cargo.

```php
belongsTo()
```

---

# Paginación

Para mejorar el rendimiento, el listado de empleados utiliza paginación.

```php
Empleado::with('cargo')->paginate(10);
```

Cada respuesta devuelve:

* página actual
* total de registros
* cantidad por página
* página siguiente
* página anterior
* enlaces de navegación

Ejemplo:

```bash
curl http://127.0.0.1:8000/api/empleados?page=2 \
-H "Authorization: Bearer $TOKEN" \
-H "Accept: application/json"
```

---

# Laravel Sanctum

La autenticación fue implementada utilizando Laravel Sanctum.

Cada usuario autenticado recibe un token único.

Ejemplo:

```json
{
    "token":"1|xxxxxxxxxxxxxxxxxxxxxxxx"
}
```

Todas las rutas protegidas requieren enviar el token en el encabezado:

```text
Authorization: Bearer TOKEN
```

Cuando el usuario ejecuta Logout:

* se eliminan los tokens activos
* el token deja de ser válido
* cualquier petición posterior devolverá:

```json
{
    "message":"Unauthenticated."
}
```

---

# Factories

Se implementaron Factories para automatizar la creación de registros.

Factories creadas:

* CargoFactory
* EmpleadoFactory
* FuncionCargoFactory
* UserFactory

Las factories utilizan Faker para generar datos aleatorios.

Ejemplo:

* nombres
* apellidos
* salarios
* cargos
* funciones
* descripciones

Esto permite poblar rápidamente la base de datos durante el desarrollo y las pruebas.

---

# Seeders

El proyecto utiliza Seeders para generar automáticamente información inicial.

Se ejecutan mediante:

```bash
php artisan migrate:fresh --seed
```

Información generada automáticamente:

* 40 cargos
* 200 funciones de cargo
* 30 empleados
* 1 usuario administrador

Usuario administrador:

Correo

```text
admin@test.com
```

Contraseña

```text
password
```

---

# Estructura del Proyecto

```text
app
│
├── Http
│   └── Controllers
│        └── Api
│
├── Models
│
database
│
├── factories
├── migrations
└── seeders
│
routes
│
└── api.php
```

---

# Flujo General de Uso

1. Clonar el proyecto.

2. Instalar dependencias.

3. Configurar el archivo `.env`.

4. Crear la base de datos.

5. Ejecutar:

```bash
php artisan migrate:fresh --seed
```

6. Iniciar el servidor.

```bash
php artisan serve
```

7. Registrar un usuario (opcional).

8. Iniciar sesión.

9. Guardar el token.

10. Consumir los endpoints protegidos.

11. Cerrar sesión.

---

# Posibles Errores

## Error

```text
Unauthenticated.
```

Solución:

* iniciar sesión nuevamente
* utilizar un token válido
* verificar el encabezado Authorization

---

## Error

```text
Could not open input file: artisan:fresh
```

Solución:

El comando correcto es:

```bash
php artisan migrate:fresh --seed
```

---

## Error

```text
SQLSTATE
```

Solución:

Verificar:

* conexión MySQL
* archivo `.env`
* nombre de la base de datos
* usuario
* contraseña

---

## Error

```text
Target class does not exist
```

Ejecutar:

```bash
composer dump-autoload
```

---

## Error

```text
404 Not Found
```

Verificar:

* que el servidor esté iniciado

```bash
php artisan serve
```

---

# Pruebas Realizadas

Durante el desarrollo se verificó el correcto funcionamiento de:

* Registro de usuarios.
* Inicio de sesión.
* Cierre de sesión.
* Protección mediante Sanctum.
* CRUD de cargos.
* CRUD de empleados.
* CRUD de funciones de cargo.
* Relaciones entre modelos.
* Validaciones.
* Paginación.
* Factories.
* Seeders.

Las pruebas fueron realizadas utilizando exclusivamente:

* Git Bash
* cURL

---

# Repositorio

Repositorio oficial del proyecto:

```text
https://github.com/wilsonandresmozo/proyecto_rds
```

---

# Autor

**Wilson Andrés Mozo Castaño**

Proyecto desarrollado como evidencia académica del programa:

**ADSO - Análisis y Desarrollo de Software**

Servicio Nacional de Aprendizaje - **SENA**

---

# Licencia

Este proyecto fue desarrollado con fines académicos y educativos.

Su utilización queda destinada al aprendizaje, demostración y práctica de desarrollo de APIs REST utilizando Laravel 13.

