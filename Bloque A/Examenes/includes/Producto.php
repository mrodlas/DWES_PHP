<?php

class Producto {
    private $nombre;
    private $precio;
    private $cantidad;
    private $id;

    public function __construct($nombre, $precio, $cantidad, $id) {
        $this->setNombre($nombre);
        $this->setPrecio($precio);
        $this->setCantidad($cantidad);
        $this->setID($id);
    }

    public function getNombre() {
        return $this->nombre;
    }

    public function getPrecio() {
        return $this->precio;
    }

    public function getCantidad() {
        return $this->cantidad;
    }

    public function getId() {
        return $this->id;
    }

    public function setNombre($nombre) {
        if (!empty($nombre)) {
            $this->nombre = $nombre;
            return true;
        }
        return false;
    }

    public function setPrecio($precio) {
        if ($precio > 0) {
            $this->precio = $precio;
            return true;
        }
        return false;
    }

    public function setCantidad($cantidad) {
        if ($cantidad > 0) {
            $this->cantidad = $cantidad;
            return true;
        }
        return false;
    }

    public function setID($id) {
        if ($id > 0) {
            $this->id = $id;
            return true;
        }
        return false;
    }

    public function getPrecioTotal() {
        return $this->precio * $this->cantidad;
    }
}
?>
