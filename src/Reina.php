<?php

require ('PiezaAjedrezInterface.php');
require ('constantes.php');
require ('Celda.php');


class Reina implements PiezaDeAjedrez {

  private $posicion; /* Celda */
  
  public function __construct ( string $celda ) {
    $this->posicion = new Celda($celda);
  } 

  // Devuelve una lista con todos los movimientos que puede realizar
  // la Reina desde su posicion actual
  // La reina puede moverse tantas casillas como quiera sobre las
  // diagonales y sobre la horizontal y la vertical.
  public function movimientosPosibles () /* -> Celda[] */ {
    $resultado = [];

    for ( $i = 1; $i <= 8; ++$i ) {
      $direcciones = [
        "Derecha"         => $this->posicion->desplazada( $i,  0),
        "DerechaArriba"   => $this->posicion->desplazada( $i, $i),
        "Arriba"          => $this->posicion->desplazada(  0, $i),
        "IzquierdaArriba" => $this->posicion->desplazada(-$i, $i),
        "Izquierda"       => $this->posicion->desplazada(-$i,  0),
        "IzquierdaAbajo"  => $this->posicion->desplazada(-$i,-$i),
        "Abajo"           => $this->posicion->desplazada(  0,-$i),
        "DerechaAbajo"    => $this->posicion->desplazada( $i,-$i)];
      
      foreach ( $direcciones as $celda ) {
        if ( 0 <= $celda->x() && $celda->x() < 8
          && 0 <= $celda->y() && $celda->y() < 8 ) {
          array_push($resultado, $celda);
        }
      }
    }
    
    return $resultado;
  }

  // Mueve la reina a la posicion que se pasa.
  // Si la posicion es invalida, lanza un error.
  public function posicionarEn ( string $celda ) {
    $celdaTipada = new Celda($celda);

    $movimientosPosibles = $this->movimientosPosibles ();

    if (in_array($celdaTipada, $movimientosPosibles)) {
      $this->posicion = $celdaTipada;
    } else {
      // TODO: Hay una mejor forma de manejar jugadas invalidas?
      throw new Exception("Celda invalida.");
    }
  }


