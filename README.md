# Top 10 Web Application Security Risks
# Lista:
##### Aplica: 1,2,5 // no tenemos : 3,6,10
##### No aplica: 4,7,8,9
---
# 1- Injection 
#### (Hecho!)
    Injection. Injection flaws, such as SQL, NoSQL, OS, and LDAP injection, occur when untrusted 
    data is sent to an interpreter as part of a command or query. The attacker’s hostile data
    can trick the interpreter into executing unintended commands or accessing data without 
    proper authorization.

    Inyección . Las fallas de inyección, como la inyección de SQL, NoSQL, OS y LDAP, ocurren 
    cuando se envían datos que no son de confianza a un intérprete como parte de un comando o consulta.
    Los datos hostiles del atacante pueden engañar al intérprete para que ejecute comandos no 
    deseados o acceda a datos sin la debida autorización. 
    
###### En /view/login/login.php
---
# 2- Broken Authentication 
#### (Hecho!)

    Broken Authentication. Application functions related to authentication and session management
    are often implemented incorrectly, allowing attackers to compromise passwords, keys, 
    or session tokens, or to exploit other implementation flaws to assume other users’ 
    identities temporarily or permanently.

    Autenticación rota . Las funciones de la aplicación relacionadas con la autenticación y la 
    administración de sesiones a menudo se implementan de manera incorrecta, lo que permite 
    a los atacantes comprometer contraseñas, claves o tokens de sesión, o explotar otras 
    fallas de implementación para asumir las identidades de otros usuarios de forma temporal o permanente. 

---
# 3- Sensitive Data Exposure.
#### (No hecho)
---
    Sensitive Data Exposure. Many web applications and APIs do not properly protect sensitive data,
    such as financial,healthcare, and PII. Attackers may steal or modify such weakly protected data 
    to conduct credit card fraud, identity theft, or other crimes. Sensitive data may be compromised
    without extra protection,such as encryption at rest or in transit, and requires special 
    precautions when exchanged with the browser.

    Exposición de datos sensibles . Muchas aplicaciones web y API no protegen adecuadamente 
    los datos confidenciales, como los financieros, de salud y PII. Los atacantes pueden robar 
    o modificar esos datos débilmente protegidos para cometer fraude con tarjetas de crédito,
    robo de identidad u otros delitos. Los datos confidenciales pueden verse comprometidos 
    sin protección adicional, como el cifrado en reposo o en tránsito, y requieren precauciones
    especiales cuando se intercambian con el navegador. 
---
# 4- XML External Entities.
#### (NO aplica porque no usamos XML)
---
    XML External Entities (XXE). Many older or poorly configured XML processors evaluate external 
    entity references within XML documents. External entities can be used to disclose internal files
    using the file URI handler, internal file shares, internal port scanning, remote code execution,
    and denial of service attacks.

    Entidades externas XML (XXE) . Muchos procesadores XML más antiguos o mal configurados evalúan 
    las referencias de  entidades externas dentro de los documentos XML. Las entidades externas se 
    pueden utilizar para divulgar archivos internos mediante el controlador de URI de archivos, 
    recursos compartidos de archivos internos, escaneo de puertos internos, 
    ejecución remota de código y ataques de denegación de servicio. 
---
# 5-  Broken Access Control. 
#### (HECHO! (Solo el usuario puede ver todo , no hay roles tampoco))
---
    Broken Access Control. Restrictions on what authenticated users are allowed to do are often 
    not properly enforced. Attackers can exploit these flaws to access unauthorized functionality 
    and/or data, such as access other users’ accounts,view sensitive files, 
    modify other users’ data, change access rights, etc.

    Control de acceso roto . Las restricciones sobre lo que pueden hacer los usuarios autenticados 
    a menudo no se aplican correctamente. Los atacantes pueden explotar estos defectos para acceder
    a funciones y / o datos no autorizados, como acceder a las cuentas de otros usuarios, 
    ver archivos confidenciales, modificar los datos de otros usuarios, cambiarlos derechos de acceso, etc. 
---    
# 6 - Security Misconfiguration. 
#### (por ver)
---
    Security Misconfiguration. Security misconfiguration is the most commonly seen issue. 
    This is commonly a result of insecure default configurations, incomplete or ad hoc configurations,
    open cloud storage, misconfigured HTTP headers,and verbose error messages containing sensitive information.
    Not only must all operating systems, frameworks, libraries, 
    and applications be securely configured, but they must be patched/upgraded in a timely fashion.

    Mala configuración de seguridad . La configuración incorrecta de seguridad es el problema más común. 
    Esto suele ser el resultado de configuraciones predeterminadas inseguras, 
    configuraciones incompletas o ad hoc,almacenamiento en la nube abierta, encabezados HTTP 
    mal configurados y mensajes de error detallados que contienen información confidencial.
    No solo todos los sistemas operativos, marcos, bibliotecas y aplicaciones deben configurarse 
    de forma segura, sino quetambién deben actualizarse o actualizarse de manera oportuna. 

---
# 7 - Cross-Site Scripting XSS.
#### (No usamos javascript)  
---
    Cross-Site Scripting XSS. XSS flaws occur whenever an application includes untrusted data in a 
    new web page without proper validation or escaping, or updates an existing web page with 
    user-supplied data using a browser API that can create HTML or JavaScript. 
    XSS allows attackers to execute scripts in the victim’s browser which can hijack 
    user sessions,deface web sites, or redirect the user to malicious sites.

    Cross-Site Scripting XSS . Los defectos de XSS ocurren cuando una aplicación incluye datos 
    que no son de confianza en una nueva página web sin la validación o el escape adecuados, 
    o actualiza una página web existente con datos proporcionados por el usuario mediante 
    una API de navegador que puede crear HTML o JavaScript. XSS permite a los atacantes ejecutar 
    scripts en el navegador de la víctima que pueden secuestrar sesiones de usuario, 
    desfigurar sitios web o redirigir al usuario a sitios maliciosos. 
---
# 8 - Insecure Deserialization
#### No se resive Datos en paquetes
---
    Insecure Deserialization. Insecure deserialization often leads to remote code execution. 
    Even if deserialization flaws do not result in remote code execution, they can be used to perform attacks,
    including replay attacks,injection attacks, and privilege escalation attacks.

    Deserialización insegura . La deserialización insegura a menudo conduce a la ejecución remota de código. 
    Incluso si las fallas de deserialización no dan como resultado la ejecución remota de código,
    pueden usarse para realizar ataques, incluidos ataques de reproducción, ataques de inyección 
    y ataques de escalada de privilegios. 
---
# 9 - Using Components with Known Vulnerabilities.
#### No ocupamos bibliotecas   
---
    Using Components with Known Vulnerabilities. Components, such as libraries, frameworks, 
    and other software modules, run with the same privileges as the application.
    If a vulnerable component is exploited, such an attack can facilitateserious data 
    loss or server takeover. 
    Applications and APIs using components with known vulnerabilities may undermine 
    application defenses and enable various attacks and impacts.

    Uso de componentes con vulnerabilidades conocidas . Los componentes, como bibliotecas, 
    marcos y otros módulos de software,se ejecutan con los mismos privilegios que la aplicación. 
    Si se explota un componente vulnerable, dicho ataque puede facilitar la pérdida de datos 
    o la toma de control del servidor. Las aplicaciones y API que utilizan componentes con 
    vulnerabilidades conocidas pueden socavar las defensas de las aplicaciones y permitir varios ataques e impactos. 

---
# 10 - Insufficient Logging & Monitoring.
#### (HECHO!)
---
    Insufficient Logging & Monitoring. Insufficient logging and monitoring, coupled with missing or 
    ineffective integration with incident response, allows attackers to further attack systems,
    maintain persistence, pivot to more systems,and tamper, extract, or destroy data.
    Most breach studies show time to detect a breach is over 200 days, typically 
    detected by external parties rather than internal processes or monitoring.

    Registro y monitoreo insuficientes . El registro y la supervisión insuficientes, 
    junto con la falta de integración o la integración ineficaz con la respuesta a incidentes, 
    permiten a los atacantes atacar aún más los sistemas,
    mantener la persistencia, cambiar a más sistemas y manipular, extraer o destruir datos. 
    La mayoría de los estudios de infracciones muestran que el tiempo para detectar una infracción 
    es de más de 200 días, generalmente detectados por partes externas en lugar de 
    procesos internos o monitoreo. 
---

#### user:
admin@admin.com
#### pass:
Adm1n

---

# Rutas
http://localhost:3000/view/Login/login.php
#### 127.0.0.1
http://127.0.0.1:3000/view/Login/login.php

#### No deberia de ingresar si no esta login 
---
#### Cliente
http://localhost:3000/view/Cliente/ClienteRead.php
http://localhost:3000/view/Cliente/ClienteCRUD.php
http://localhost:3000/app/cliente/CUpdate.php?id=1

#### 127.0.0.1
http://127.0.0.1:3000/view/Cliente/ClienteRead.php
http://127.0.0.1:3000/view/Cliente/ClienteCRUD.php
http://127.0.0.1:3000/app/cliente/CUpdate.php?id=1

---

#### Cuenta
http://localhost:3000/view/Cuentas/CuentaRead.php?id=1
http://localhost:3000/view/Cuentas/CuentaCRUD.php?id=1
http://localhost:3000/app/cuentas/CuUpdate.php?id=1
#### 127.0.0.1
http://127.0.0.1:3000/view/Tarjeta/TarjetaRead.php?id=1
http://127.0.0.1:3000/view/Tarjeta/TarjetaCRUD.php?id=1
http://127.0.0.1:3000/app/tarjeta/TUpdate.php?id=1

---

#### Tarjeta
http://localhost:3000/view/Tarjeta/TarjetaRead.php?id=1
http://localhost:3000/view/Tarjeta/TarjetaCRUD.php?id=1
http://localhost:3000/app/tarjeta/TUpdate.php?id=1

#### 127.0.0.1
http://127.0.0.1:3000/view/Tarjeta/TarjetaRead.php?id=1
http://127.0.0.1:3000/view/Tarjeta/TarjetaCRUD.php?id=1
http://127.0.0.1:3000/app/tarjeta/TUpdate.php?id=1

---
---
---

# Ejecutar
en carpeta raiz ejecutar :

php -S localhost:3000

http://localhost:3000


# extra
buscar como activar o descomentar en php.ini el pg_connect

sudo apt-get install php7.3-pgsql


cd /etc/php/7.4/apache2/
code php.ini 

apache2ctl restart
/etc/init.d/apache2 restart




