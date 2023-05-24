<?php

class Premio extends Connection
{
  private $table = 'tbpremio';
  private $query = 'SELECT * FROM tbpremio';
  
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
    return $this->connection->query($this->query . ' WHERE id = ' . $id)->fetch_assoc();
  }

  public function insert($titulo)
  {
    $sql = "INSERT INTO " . $this->table . " (titulo) VALUES ('" . $titulo . "')";
    return $this->connection->query($sql);
  }

  public function update($id, $titulo)
  {
    $sql = "UPDATE " . $this->table . " SET titulo='" . $titulo . "' WHERE id=" . $id;
    return $this->connection->query($sql);
  }

  public function delete($id)
  {
    $sql = "DELETE FROM  " . $this->table . " WHERE id=" . $id;
    return $this->connection->query($sql);
  }
}
