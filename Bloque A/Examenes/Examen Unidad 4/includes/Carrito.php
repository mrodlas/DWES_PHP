<?php
class Carrito {
    private $productos;
    private $impuesto;

    public function __construct($productos = [], $impuesto = 0.21) {
        $this->productos = $productos;
        $this->impuesto = $impuesto;
    }

    public function agregarProducto($producto) {
        foreach ($this->productos as $prod) {
            if ($prod->getId() === $producto->getId()) {
                return false; // El producto ya existe en el carrito
            }
        }
        $this->productos[] = $producto;
        return true; // Producto agregado
    }

    public function calcularSubtotal() {
        $subtotal = 0;
        foreach ($this->productos as $producto) {
            $subtotal += $producto->getPrecioTotal();
        }
        return $subtotal;
    }

    public function calcularImpuestos() {
        return $this->calcularSubtotal() * $this->impuesto;
    }

    public function calcularTotal() {
        return $this->calcularSubtotal() + $this->calcularImpuestos();
    }

    public function muestraCarrito() {
        foreach ($this->productos as $producto) {
            echo "<tr>";
            echo "<td>" . $producto->getId() . "</td>";
            echo "<td>" . $producto->getNombre() . "</td>";
            echo "<td>" . $producto->getPrecio() . " €</td>";
            echo "<td>" . $producto->getCantidad() . "</td>";
            echo "<td>" . $producto->getPrecioTotal() . " €</td>";
            echo "</tr>";
        }
    }
}
?>