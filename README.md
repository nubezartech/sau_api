<link href='http://fonts.googleapis.com/css?family=Roboto' rel='stylesheet' type='text/css'>

<h1 align="center" style="font-family:'Roboto';">Sistema de Acceso Unificado API</h1>

<div align="center">

[![Status](https://img.shields.io/badge/status-active-success.svg)]()
[![GitHub Pull Requests](https://img.shields.io/github/issues-pr/kylelobo/The-Documentation-Compendium.svg)](https://github.com/orgs/sau_api/sau_api/pulls?q=is%3Apr+is%3Aclosed)
[![GitHub open-pull-requests](https://badgen.net/github/open-prs/Naereen/Strapdown.js)](pulls?q=is%3Aopen+is%3Apr)



[![Tests](https://github.com/anuraghazra/github-readme-stats/workflows/Test/badge.svg)](https://github.com/orgs/nubezartech/sau_api/actions)

</div>


## 📝 Tabla de contenido

- [Instalación](#installation)
- [Configuración del entorno](#enviroment)
- [Despliegue](#deployment)
- [Author](#author)


## 🔧 Instalación <a name = "installation"></a>

Clona el repositorio en tu maquina local.
```
git clone https://github.com/orgs/nubezartech/sau_api.git
```

Accede al directorio del proyecto.
```
cd sau_api
```
Accede al directorio del código.
```
cd src
```   
Instala las librerias y dependencias mediante composer y npm.
```
composer install
```

## ⛏️ Configura en entorno <a name = "enviroment"></a>

- <b>[ .env.example ]</b>- Archivo de variables de entorno de ejemplo.

Copiar en archivo .env.example en el directorio raíz del proyecto, y renombralo a .env. 
```
cp .env.example .env
```
Configura las variables de entorno.

## 🚀 Despliegue al servidor <a name = "deployment"></a>

Una vez desarrolladas las features e incorporadas *(push)* a la rama **"dev"**, se ejecutaran los test. Si estos se ejecutan de forma correcta y no devuelven ningún errror, se creará una PullRequest a **"main"** mediante GitHub Actions. Ésta quedará pendiente de revisión y una vez aprovada se incorporarán los cambios a la rama principal *("main")*. A su vez, se desplegará el proyecto a través de GitHub Actions y SSH en el servidor web de producción.


## ✍️ Authors <a name = "authors"></a>

- [@aabadmo4](https://github.com/aabadmo4) - <b>Adan Nahir Abad Mora</b> <br>
<i>CEO y Digital Chief Officer en <a href="http://www.nubezar.tech">Soluciones Informáticas NubezarTech</a></i>

