<?php

class Filme extends Connection
{
  private $table = 'tbfilme';
  private $query = 'SELECT tbfilme.id, tbfilme.idPremio, tbfilme.nome, tbfilme.ano, tbpremio.titulo  FROM tbfilme INNER JOIN tbpremio ON tbfilme.idPremio = tbpremio.id';
  
  public function getAll()
  {   
    $result = $this->connection->query($this->query);
    $lista = array();
    while ($record = $result->fetch_object()) {
      array_push($lista, $record);
    }
    $result->close();
    return $lista;		
  }

  public function getById($id)
  {
    return $this->connection->query($this->query . ' WHERE tbfilme.id = ' . $id)->fetch_assoc();
  }

  public function insert($idPremio, $nome, $ano)
  {
    $sql = "INSERT INTO " . $this->table . " (idPremio, nome, ano) VALUES (".$idPremio.", '".$nome."',".$ano.")";
    return $this->connection->query($sql);
  }

  public function update($id, $titulo, $nome, $ano)
  {
    $sql = "UPDATE " . $this->table . " SET idPremio='" . $titulo . "', nome='".$nome."', ano=".$ano." WHERE id=" . $id;
    return $this->connection->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM  " . $this->table . " WHERE id=" . $id;
    return $this->connection->query($sql);
  }
}
