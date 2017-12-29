<?php 
/*  
 * Classe para operações CRUD na tabela ARTIGO   
 */
class crudNoticia{  

  /*  
   * Atributo para conexão com o banco de dados   
   */  
  private $pdo = null;  

  /*  
   * Atributo estático para instância da própria classe    
   */  
  private static $crudNoticia = null; 

  /*  
   * Construtor da classe como private  
   * @param $conexao - Conexão com o banco de dados  
   */  
  private function __construct($conexao){  
    $this->pdo = $conexao;  
  }  
  
  /*
  * Método estático para retornar um objeto crudNoticia    
  * Verifica se já existe uma instância desse objeto, caso não, instância um novo    
  * @param $conexao - Conexão com o banco de dados   
  * @return $crudNoticia - Instancia do objeto crudNoticia    
  */   
  public static function getInstance($conexao){   
   if (!isset(self::$crudNoticia)):    
    self::$crudNoticia = new crudNoticia($conexao);   
   endif;   
   return self::$crudNoticia;    
  } 

  /*   
  * Metodo para inclusão de novos registros   
  * @param $categoria - Valor para o campo categoria   
  * @param $titulo - Valor para o campo titulo   
  * @param autor  - Valor para o campo autor   
  */   
  public function insert($titulo, $link, $destaque, $conteudo, $destino, $idjogador){   
 
    try{   
     $sql = "INSERT INTO noticia (titulo, link, destaque, conteudo, imagem, idjogador) VALUES (?, ?, ?, ?, ?, ?)";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $titulo);   
     $stm->bindValue(2, $link);   
     $stm->bindValue(3, $destaque);   
     $stm->bindValue(4, $conteudo);   
     $stm->bindValue(5, $destino);   
     $stm->bindValue(6, $idjogador);   
     $stm->execute();   
     echo"<script language='javascript' type='text/javascript'>alert('Cadastro realizado com sucesso');window.location.href='../noticiabox.php'</script>"; 
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   
  } 
 
  /*   
  * Metodo para edição de registros   
  * @param $categoria - Valor para o campo categoria   
  * @param $titulo - Valor para o campo titulo   
  * @param autor  - Valor para o campo autor   
  * @param id   - Valor para o campo id   
  */   
  public function update($titulo, $link, $destaque, $conteudo, $imagem, $idjogador, $idnoticia){   
  
    try{   
     $sql = "UPDATE noticia SET titulo=?, link=?, destaque=?, conteudo=?, imagem=?, idjogador=? WHERE idnoticia=?";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $titulo);   
     $stm->bindValue(2, $link);   
     $stm->bindValue(3, $destaque);   
     $stm->bindValue(4, $conteudo); 
     $stm->bindValue(5, $imagem);  
     $stm->bindValue(6, $idjogador);
     $stm->bindValue(7, $idnoticia);  
     $stm->execute();   
     echo"<script language='javascript' type='text/javascript'>alert('Atualizado com sucesso');window.location.href='../noticiabox.php'</script>";   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>";   
    }   
     
  }  

  /*   
  * Metodo para exclusão de registros   
  * @param id - Valor para o campo id   
  */   
  public function delete($idnoticia){      
    try{   
     $sql = "DELETE FROM noticia WHERE idnoticia=?";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $idnoticia, PDO::PARAM_INT);   
     $stm->execute();   
    echo"<script language='javascript' type='text/javascript'>alert('Excluido com sucesso');window.location.href='../noticiabox.php'</script>";   
    }catch(PDOException $erro){   
      echo "<script>alert('Erro na linha: {$sql}')</script>";
     echo "Erro na linha: {$erro->getLine()}";    
    }       
  } 
 
  /*   
  * Metodo para consulta de artigos   
  * @return $dados - Array com os registros retornados pela consulta   
  */   
  public function getAllNoticia(){   
   try{   
    $sql = "SELECT * FROM noticia";   
    $stm = $this->pdo->prepare($sql);   
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
    return $dados;   
   }catch(PDOException $erro){   
    echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }   
  
   public function getNoticiaIndex(){   
  try{   
      $i =1;
     $sql = "SELECT * FROM noticia where destaque=? ORDER BY idnoticia DESC LIMIT 3";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $i);   
     $stm->execute();   
     $dados_destaq = $stm->fetchAll(PDO::FETCH_OBJ);   
     return $dados_destaq;   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
  }   
  /*   
  * Metodo para consulta de artigos   
  * @return $dados - Array com os registros retornados pela consulta   
  */   
  public function getAllNoticiaDestaque(){   
    try{   
      $i =1;
     $sql = "SELECT * FROM noticia where destaque=?";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $i);   
     $stm->execute();   
     $dados_destaq = $stm->fetchAll(PDO::FETCH_OBJ);   
     return $dados_destaq;   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   }   
   public function getAllNoticiaNormal(){   
    try{   
     $sql = "SELECT * FROM noticia where destaque='0'";   
     $stm = $this->pdo->prepare($sql);   
     $stm->execute();   
     $dados_normal = $stm->fetchAll(PDO::FETCH_OBJ);   
     return $dados_normal;   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   }   
 /* Metodo para consulta de noticias   
  * @return $dados - Array com os registros retornados pela consulta   
  */   
  public function getNoticiaJog($idnoticia){   
   try{   
    $sql = "SELECT nt.*, at.idJogador FROM noticia nt LEFT JOIN atleta at on at.idJogador = nt.idJogador where nt.idnoticia=? LIMIT 1";   
    $stm = $this->pdo->prepare($sql);   
    $stm->bindValue(1, $idnoticia);  
    $stm->execute();   
    $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
    return $dados;   
   }catch(PDOException $erro){   
    echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
   }   
  }  
  public function getAllAtleta(){   
    try{   
     $sql = "SELECT * FROM atleta  ORDER BY nome";   
     $stm = $this->pdo->prepare($sql);   
     $stm->execute();   
     $dados_atleta = $stm->fetchAll(PDO::FETCH_OBJ);   
     return $dados_atleta;   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   }   
  public function getNoticiaAnt($idnoticia){  
    $i = 1;
    $idnoticia = ($idnoticia - $i);
    try{   
     $sql = "SELECT * FROM noticia where idnoticia=? LIMIT 1";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $idnoticia);  
     $stm->execute();   
     $row = $stm->fetchAll(PDO::FETCH_OBJ);   
     return $row;   
    }catch(PDOException $erro){   
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   }  
   public function getNavegacao($inicio, $limite){     
    
    try{
      $sql = "SELECT * FROM noticia ORDER BY idnoticia DESC LIMIT ".$inicio. ",". $limite;
      $query = $this->pdo->prepare($sql);	
      $query->execute();
      $naveg = $query->fetchAll(PDO::FETCH_OBJ);
      return $naveg;
      }catch(PDOexception $error_sql){
      echo 'Erro ao retornar os Dados.'.$error_sql->getMessage();
    }
   }  
   public function getTotalNoticia($limite){       
        try{
        $sql_Total = 'SELECT idnoticia FROM noticia';
        $query_Total = $this->pdo->prepare($sql_Total);	
        $query_Total->execute();
        
       
        return $query_Total;
        }catch(PDOexception $error_Total){
        echo 'Erro ao retornar os Dados. '.$error_Total->getMessage();
      }
   }
   public function getValidaLogin($login, $senha){   
    try{   
     $sql = "SELECT * FROM login where login=? and senha=?";   
     $stm = $this->pdo->prepare($sql);   
     $stm->bindValue(1, $login);  
     $stm->bindValue(2,$senha);
     $stm->execute();   
     $dados = $stm->fetchAll(PDO::FETCH_OBJ);   
     echo"<script language='javascript' type='text/javascript'>window.location.href='index.php'</script>"; 
     header("Location:index.php");
     return $dados;   
    
    }catch(PDOException $erro){  
      echo"<script language='javascript' type='text/javascript'>alert('Dados Inválido, verifique!');window.location.href='login.php'</script>";  
     echo "<script>alert('Erro na linha: {$erro->getLine()}')</script>"; 
    }   
   }  
 }  