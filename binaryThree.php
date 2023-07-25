class Nodo {
    public $valor;
    public $izquierda;
    public $derecha;

    public function __construct($valor) {
        $this->valor = $valor;
        $this->izquierda = null;
        $this->derecha = null;
    }
}

class ArbolBinario {
    public $raiz;

    public function __construct() {
        $this->raiz = null;
    }

    public function insertar($valor) {
        $nuevoNodo = new Nodo($valor);

        if ($this->raiz === null) {
            // Si el árbol está vacío, el nuevo nodo se convierte en la raíz.
            $this->raiz = $nuevoNodo;
        } else {
            // Si el árbol no está vacío, llamamos a la función auxiliar insertarNodo().
            $this->insertarNodo($this->raiz, $nuevoNodo);
        }
    }

    private function insertarNodo(&$nodoActual, &$nuevoNodo) {
        // Esta función es privada y auxiliar para insertar un nuevo nodo en el árbol.

        if ($nodoActual === null) {
            // Si el nodo actual es nulo, encontramos la posición para el nuevo nodo.
            $nodoActual = $nuevoNodo;
        } else {
            if ($nuevoNodo->valor < $nodoActual->valor) {
                // Si el valor del nuevo nodo es menor que el valor del nodo actual,
                // lo insertamos en la rama izquierda.
                $this->insertarNodo($nodoActual->izquierda, $nuevoNodo);
            } else {
                // Si el valor del nuevo nodo es mayor o igual que el valor del nodo actual,
                // lo insertamos en la rama derecha.
                $this->insertarNodo($nodoActual->derecha, $nuevoNodo);
            }
        }
    }

    public function inorden($nodo = null) {
        // Función para recorrer el árbol inorden (izquierda, raíz, derecha).

        if ($nodo === null) {
            $nodo = $this->raiz;
        }

        if ($nodo !== null) {
            // Recorremos primero la rama izquierda.
            $this->inorden($nodo->izquierda);
            // Imprimimos el valor del nodo actual.
            echo $nodo->valor . " ";
            // Recorremos la rama derecha.
            $this->inorden($nodo->derecha);
        }
    }

    public function inordenDescendente($nodo = null) {
    // Función para recorrer el árbol inorden en orden descendente (derecha, raíz, izquierda).

    if ($nodo === null) {
        $nodo = $this->raiz;
    }

    if ($nodo !== null) {
        // Recorremos primero la rama derecha.
        $this->inordenDescendente($nodo->derecha);
        // Imprimimos el valor del nodo actual.
        echo $nodo->valor . " ";
        // Recorremos la rama izquierda.
        $this->inordenDescendente($nodo->izquierda);
    }
}
}


