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
$tipoFigura = '';
$area = 0;
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $tipoFigura = isset($_POST["tipo_figura"]) ? $_POST["tipo_figura"] : null;
    
    if (!empty($tipoFigura)) {
        switch ($tipoFigura) {
            case "circulo":
                $radio = isset($_POST["radio"]) ? floatval($_POST["radio"]) : 0;
                $figura = new Circulo($radio);
                $area = $figura->calcularArea();
                break;
            case "cuadrado":
                $lado = isset($_POST["lado"]) ? floatval($_POST["lado"]) : 0;
                $figura = new Cuadrado($lado);
                $area = $figura->calcularArea();
                break;
            case "rectangulo":
                $base = isset($_POST["base"]) ? floatval($_POST["base"]) : 0;
                $altura = isset($_POST["altura"]) ? floatval($_POST["altura"]) : 0;
                $figura = new Rectangulo($base, $altura);
                $area = $figura->calcularArea();
                break;
            case "triangulo":
                $base = isset($_POST["base"]) ? floatval($_POST["base"]) : 0;
                $altura = isset($_POST["altura"]) ? floatval($_POST["altura"]) / 2 : 0;
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
    <h1>Calcular Áreas de Figuras Geométricas</h1>
    <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
        <label>Selecciona una figura:</label>
        <select name="tipo_figura">
            <option value="circulo" <?php echo($tipoFigura == 'círculo'? 'selected':''  );?>>Círculo </option>
            <option value="cuadrado" <?php echo($tipoFigura == 'cuadrado'? 'selected':'');?>>Cuadrado  </option>
            <option value="rectangulo" <?php echo($tipoFigura == 'rectangulo'? 'selected':'');?>>Rectángulo </option>
            <option value="triangulo" <?php echo($tipoFigura == 'triangulo'? 'selected':'');?>>Triángulo  </option>
        </select><input type="submit" value="Cambiar">
        <br>
        <?php
        if (isset($tipoFigura)) {
            switch ($tipoFigura) {
                case "circulo":
                    echo '<label>Radio:</label> <input type="number" name="radio" step="any">';
                    break;
                case "cuadrado":
                    echo '<label>Lado:</label> <input type="number" name="lado" step="any">';
                    break;
                case "rectangulo":
                    echo '<label>Base:</label> <input type="number" name="base" step="any"><br>';
                    echo '<label>Altura:</label> <input type="number" name="altura" step="any">';
                    break;
                case "triangulo":
                    echo '<label>Base:</label> <input type="number" name="base" step="any"><br>';
                    echo '<label>Altura:</label> <input type="number" name="altura" step="any">';
                    break;
            }
        }
        ?>
        <br>
        <input type="submit" value="Seleccionar">
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
