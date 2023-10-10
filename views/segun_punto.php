<?php
class FiguraGeometrica {
    public function calcularArea() {
        return 0;
    }
}

class Circulo extends FiguraGeometrica {
    public $radio;

    public function __construct($radio) {
        $this->radio = $radio;
    }

    public function calcularArea() {
        return M_PI * pow($this->radio, 2);
    }
}

class Cuadrado extends FiguraGeometrica {
    private $lado;

    public function __construct($lado) {
        $this->lado = $lado;
    }

    public function calcularArea() {
        return pow($this->lado, 2);
    }
}

class Rectangulo extends FiguraGeometrica {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return $this->base * $this->altura;
    }
}

class Triangulo extends FiguraGeometrica {
    private $base;
    private $altura;

    public function __construct($base, $altura) {
        $this->base = $base;
        $this->altura = $altura;
    }

    public function calcularArea() {
        return 0.5 * $this->base * $this->altura;
    }
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoFigura = $_POST["tipo_figura"];
    $area = 0;

    if(!empty($_POST["lado"])){
    switch ($tipoFigura) {
        case "circulo":
            $radio = floatval(($_POST["radio"]));
            $figura = new Circulo($radio);
            $area = $figura->calcularArea();
            break;
        case "cuadrado":
            $lado = floatval($_POST["lado"]);
            $figura = new Cuadrado($lado);
            $area = $figura->calcularArea();
            break;
        case "rectangulo":
            $base = floatval($_POST["base"]);
            $altura = floatval($_POST["altura"]);
            $figura = new Rectangulo($base, $altura);
            $area = $figura->calcularArea();
            break;
        case "triangulo":
            $base = floatval($_POST["base"]);
            $altura = floatval($_POST["altura"]);
            $figura = new Triangulo($base, $altura);
            $area = $figura->calcularArea();
            break;
    }
}
}
?>


<!DOCTYPE html>
<html>
<head>
    <title>Calculadora de Áreas</title>
</head>
<body>
    <h1>Calculadora de Áreas de Figuras Geométricas</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Selecciona una figura:</label>
        <select name="tipo_figura">
            <option value="circulo">Círculo</option>
            <option value="cuadrado">Cuadrado</option>
            <option value="rectangulo">Rectángulo</option>
            <option value="triangulo">Triángulo</option>
        </select>
        <br>
        <?php
        if (isset($tipoFigura)) {
            switch ($tipoFigura) {
                case "circulo":
                    echo '<label>Radio:</label> <input type="number" name="radio" required step="any">';
                    break;
                case "cuadrado":
                    echo '<label>Lado:</label> <input type="number" name="lado" required step="any">';
                    break;
                case "rectangulo":
                    echo '<label>Base:</label> <input type="number" name="base" required step="any"><br>';
                    echo '<label>Altura:</label> <input type="number" name="altura" required step="any">';
                    break;
                case "triangulo":
                    echo '<label>Base:</label> <input type="number" name="base" required step="any"><br>';
                    echo '<label>Altura:</label> <input type="number" name="altura" required step="any">';
                    break;
            }
        }
        ?>
        <br>
        <input type="submit" value="Calcular">
    </form>
    <br>
    <?php
    if (isset($tipoFigura)) {
        echo "<h2>Resultado:</h2>";
        echo "El área de la figura seleccionada es: " . number_format($area, 2);
    }
    ?>
</body>
</html>