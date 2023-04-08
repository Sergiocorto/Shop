class Router
{
    private $routes;

    public function __construct() {
        $this->routes = [
            'products' => ProductController::getProductsView()
        ];
    }
}

class ProductController
{

    private $product;

    public function __construct(Product $product)
    {
        $this->product = $product;
    }

    public static function getProductsView()
    {
        $this->product->getProduct();
    }
}

class Product
{

    public static function getProduct()
    {
        print_r("products");
    }
}