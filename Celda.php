<?php

class Celda {
  private $x_;
  private $y_;

  public function __construct ( string $pos ) {
    $this->x_ = ord( $pos[0] ) - ord('A');
    $this->y_ = ord( $pos[1] ) - ord('1');
  }

  public function desplazada (int $dx, int $dy) {
    $resultado = $this;
    
    $resultado->x += $dx;
    $resultado->y += $dy;
    
    return $resultado;
  }

  public function x () { return $this->x_; }
  public function y () { return $this->y_; }
}
