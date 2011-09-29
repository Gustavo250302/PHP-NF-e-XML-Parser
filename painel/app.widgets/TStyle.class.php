<?php
/**
 * classe TStyle
 * classe para abstra��o Estilos CSS
 */
class TStyle
{
    private $name;          // nome do estilo
    private $properties;    // atributos
    static private $loaded; // array de estilos carregados
    
    /**
     * m�todo construtor
     * instancia uma tag html
     * @param $name     = nome da tag
     */
    public function __construct($name)
    {
        // atribui o nome do estilo
        $this->name = $name;
    }
    
    /**
     * m�todo __set()
     * intercepta as atribui��es � propriedades do objeto
     * @param $name       = nome da propriedade
     * @param $value      = valor
     */
    public function __set($name, $value)
    {
        // substitui o "_" por "-" no nome da propriedade
        $name = str_replace('_', '-', $name);
        // armazena os valores atribu�dos ao array properties
        $this->properties[$name] = $value;
    }
    
    /**
     * m�todo show()
     * exibe a tag na tela
     */
    public function show()
    {
        // verifica se este estilo j� foi carregado
        if (!isset(self::$loaded[$this->name]))
        {
            // Altera��o em 14/09/2011 - fazer com que carregeu o estilo CSS do bootstrap ANTES
            // do style padr�o dos relat�rios. Iralianhando aqui nesta parte para adequa��o de layout na app:
            // Se eu carregar esta classe na pagina do painel informativo a exemplo do src code relatorio3.php ou de outro exemplo
            // talvez nao precise indicar o bootstrap.css abaixo:

            // echo "<style type='text/css'> </style>";
            echo "<link rel='stylesheet' type='text/css' href='../../../css/bootstrap-1.2.0.css'>";
            echo "<style type='text/css' media='screen'>\n";
            // exibe a abertura do estilo
            echo ".{$this->name}\n";
            echo "{\n";
            if ($this->properties)
            {
                // percorre as propriedades
                foreach ($this->properties as $name=>$value)
                {
                    echo "\t {$name}: {$value};\n";
                }
            }
            echo "}\n";
            echo "</style>\n";
            // marca o estilo como j� carregado
            self::$loaded[$this->name] = TRUE;
        }
    }
}
?>