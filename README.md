<h1><b>Permissões West Software </b></h1>

#Execute: 

php artisan vendor:publish 

php artisan event:generate

#Registar midleware em App\Http\Kernel
  protected $routeMiddleware = [
      ...

    'check.permissions' => \Westsoft\Acl\Middleware\CheckPermissions::class,
  ];


#Atualização para versão 2.0

#Mudanças:
    -Revisão ACL

    -Menu de navegação

    -Layout Modern Admin

    -Loading das permissões listener

    -Segurança não alterar dados de terceiros url

    -Add Toastr alert

        #acrescentar as diretivas @toast ao arquivo de layout
        <!doctype html>
        <html>
            <head>
                <title>Toastr.js</title>
                @toastr_css
            </head>
            <body>
                
            </body>
            @jquery
            @toastr_js
            @toastr_render
        </html>