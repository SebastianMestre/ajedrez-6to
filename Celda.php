<?php

class Celda {
  private $x_; /* int */
  private $y_; /* int */

  public function __construct ( string $pos ) {
    $this->x_ = ord( $pos[0] ) - ord('A');
    $this->y_ = ord( $pos[1] ) - ord('1');
  }

  // Devuelve una nueva Celda desplazada tanto como se indique de donde
  // se encuentra la instancia sobre la cual se llama el metodo
  public function desplazada (int $dx, int $dy) /* -> Celda */ {
    $resultado = clone $this;
    
    $resultado->x_ += $dx;
    $resultado->y_ += $dy;

    return $resultado;
  }

  public function x () { return $this->x_; }
  public function y () { return $this->y_; }
}
