# 🧪 Sistema de Gestión de Lista de Espera

Este proyecto es una **prueba técnica** que consiste en el desarrollo de una aplicación web para gestionar listas de espera en un entorno comercial. El sistema permite a los clientes registrarse en una cola y a los empleados administrar dicha lista de forma eficiente.

## 🛠️ Tecnologías utilizadas

- **Frontend:** HTML, CSS, JavaScript  
- **Backend:** PHP  
- **Base de datos:** MySQL  

## ✨ Funcionalidades principales

- 📥 Registro de clientes en la lista de espera mediante formulario  
- 🔍 Validación de citas existentes para evitar duplicados  
- 🔐 Inicio de sesión para acceder al panel de gestión  
- 📋 Visualización de listas por estado: *En espera*, *En atención* y *Atendidos*  
- 🔄 Cambio de estado de los usuarios, registrando fecha y hora del evento  
- ✅ Validaciones en cada página para prevenir errores y mejorar la experiencia de uso  

## 🔑 Credenciales de acceso

El sistema ya incluye credenciales predefinidas para acceder al panel de gestión:

- **Correo:** `admin@demo.com`  
- **Contraseña:** `1234`  

Estas credenciales permiten iniciar sesión como administrador y gestionar las citas.

## 🚀 Cómo ejecutar el proyecto

1. Clona este repositorio en tu equipo local  
2. Abre **Visual Studio Code** y **XAMPP**  
   - Asegúrate de tener instalada la extensión **PHP Server** en VSCode  
3. Ubica el archivo `lista_espera.sql` en la carpeta `bdd` del proyecto  
4. Importa el archivo `.sql` en **phpMyAdmin** desde XAMPP  
5. Abre `index.html` con PHP Server  
   - Haz clic derecho sobre el archivo y selecciona `PHP Server: Serve Project`  
6. Accede a la aplicación desde el navegador y verifica su funcionamiento  

## ⚙️ Nota sobre la conexión a la base de datos

Si el sistema no logra conectarse correctamente a la base de datos, asegúrate de revisar y ajustar las credenciales de conexión en los archivos PHP. Verifica que los siguientes datos coincidan con tu configuración local:

- Nombre de usuario  
- Contraseña  
- Nombre de la base de datos  
- Host  

Una configuración incorrecta puede impedir el funcionamiento del sistema.
