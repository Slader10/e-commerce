<!doctype html>
<html lang="en" ng-app="app">
  <head>
    <meta charset="utf-8" />
    <title>Games Shop</title>
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("css/bootstrap.3.0.3.min.css") }}"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("css/bootstrap.theme.3.0.3.min.css") }}"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("css/shared.css") }}"
    />
    <link
      type="text/css"
      rel="stylesheet"
      href="{{ asset("css/style.css") }}"
    />
    <script
      type="text/javascript"
      src="{{ asset("js/angularjs.1.2.4.min.js") }}"
    ></script>
    <script
      type="text/javascript"
      src="{{ asset("js/angularjs.cookies.1.2.4.min.js") }}"
    ></script>
  </head>
  <body ng-controller="main">
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <div class="container">
            <div class="navbar-header">
                
                <a class="navbar-brand" href="/">Games Shop</a>
            </div>
           
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container -->
    </nav>
    <div class="container contenido">
      
      <div class="row">
        <div class="col-md-8" ng-controller="products">
          <h2>
            Productos
          </h2>
          <div class="categories btn-group">
            <button
              type="button"
              class="category btn btn-info active"
              ng-click="products.setCategory(null)"
              ng-class="{ 'active' : products.category == null }"
            >
              All
            </button>
            <button
              type="button"
              class="category btn btn-info"
              ng-repeat="category in products.categories"
              ng-click="products.setCategory(category)"
              ng-class="{ 'active' : products.category.id == category.id }"
            >
              @{{ category.name }}
            </button>
          </div>
          <div class="products">
            <div
              class="product media"
              ng-repeat="product in products.products | filter : products.filterByCategory"
            >
              
              <div class="media-body">
                <h4 class="media-heading">@{{ product.name }}</h4>
                <p>
                  Price: @{{ product.price }}, Stock: @{{ product.stock }}
                </p>
              </div>
              <button
                type="button"
                class="pull-left btn btn-primary"
                ng-click="products.addToBasket(product)"
              >
                Agregar <span class="glyphicon glyphicon-plus"></span> <span class="glyphicon glyphicon-shopping-cart"></span>
              </button>
            </div>
          </div>
        </div>
        <div class="col-md-4 " ng-controller="basket">
          <h2>
            Carrito de Compras <span class="glyphicon glyphicon-shopping-cart"></span>
          </h2>
          <form class="basket">
            <table class="table table-hover">
              <tr
                class="product"
                ng-repeat="product in basket.products track by $index"
                ng-class="{ 'hide' : basket.state != 'shopping' }"
              >
                <td class="name">
                  @{{ product.name }}
                </td>
                <td class="quantity">
                  <input
                    class="form-control"
                    type="number"
                    ng-model="product.quantity"
                    ng-change="basket.update()"
                    min="1"
                  />
                </td>
                <td class="product">
                  @{{ product.total }}
                </td>
                <td class="product">
                  <a
                    class="remove glyphicon glyphicon-remove"
                    ng-click="basket.remove(product)"
                  ></a>
                </td>
              </tr>
            </table>
            <div class=" input_space">
                <div
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'shopping' }"
                >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="email"
                    ng-model="basket.email"
                  />
                </div>
              </div>
              <div class=" input_space">
                <div
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'shopping' }"
                >
                  <input
                    type="password"
                    class="form-control"
                    placeholder="password"
                    ng-model="basket.password"
                  />
                </div>
              </div>
              <div class=" input_space">
                <div
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'shopping' }"
                >
                  <button
                    type="button"
                    class="pull-left btn btn-success"
                    ng-click="basket.authenticate()"
                  >
                    Iniciar Sesión
                  </button>
                </div>
              </div>
              <div class="input_space">
                <div
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'paying' }"
                >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="card number"
                    ng-model="basket.number"
                  />
                </div>
              </div>
              <div class=" input_space">
                <div
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'paying' }"
                >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="expiry"
                    ng-model="basket.expiry"
                  />
                </div>
              </div>
              <div class=" input_space">
                <div
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'paying' }"
                >
                  <input
                    type="text"
                    class="form-control"
                    placeholder="security number"
                    ng-model="basket.security"
                  />
                </div>
              </div>
              <div class=" input_space">
                <div
                  colspan="4"
                  ng-class="{ 'hide' : basket.state != 'paying' }"
                >
                  <button
                    type="button"
                    class="pull-left btn btn-success"
                    ng-click="basket.pay()"
                  >
                    Realizar Pago
                  </button>
                </div>
              </div>
          </form>
        </div>
      </div>
    </div>
    <script
      type="text/javascript"
      src="{{ asset("js/shared.js") }}"
    ></script>
  </body>
</html>