<?php
/**
 * Created by PhpStorm.
 * User: alterwalker
 * Date: 27.02.2018
 * Time: 20:20
 */

namespace components;


abstract class Model
{
    public $pdo = null;
    public $table = '';
    public $fields = [];
    public $rules = [];

    public function __construct()
    {
        $this->pdo = \components\Db::getInstance()->getPDO();
    }

    public function select($closure = []) {

        $query = 'select * from ' . $this->table;

        if(!empty($closure['where'])) {
            $query .= ' where ' . $closure['where'];
        }



        if(!empty($closure['orderby'])) {
            $query .= ' order by ' . $closure['orderby'];
        }

        if(!empty($closure['limit'])) {
            $query .= ' limit ' . $closure['limit'];
        }

        $statement = $this->pdo->prepare($query);

        $statement->execute();

        return $statement->fetchAll();

    }

    public function getById( $id = null ) {

        if(empty($id)) {
            return null;
        }

        /* $query = 'select * from ' . $this->table . ' where id = :id'; */
        $query = 'select * from ' . $this->table . ' where id = :id';

        $statement = $this->pdo->prepare($query);

        $statement->execute([ 'id' => $id ]);

        return $statement->fetch();

    }

    public function updateById( $id = null, $values )
    {

        if(empty($id) || empty($values)) {

            return null;
        }

        if(!$this->validate($values, $this->fields)) {
            return false;
        }

        $query = 'update ' . $this->table . ' set ';

        $fields = [];
        foreach ($values as $key => $value) {
            $fields[] = "{$key} = :{$key}";
        }

        $query .= implode(', ', $fields);

        //$query .= ' where id = :id';
        $query .= ' where id = :id';

        $statement = $this->pdo->prepare($query);

        return $statement->execute(array_merge( $values , ['id' => $id]));
    }


    public function deleteById( $id = null)
    {

        if (empty($id)) {

            return null;
        }

        //$query = 'delete from ' . $this->table . ' where id = :id ';
        $query = 'delete from ' . $this->table . ' where id = :id ';

        $statement = $this->pdo->prepare($query);

        //return $statement->execute(['id' => $id]);
        return $statement->execute(['id' => $id]);
    }

    public function insert ($values = []) {


/*
        $statement = $this->pdo->prepare("insert into blogs (title,content) VALUES ('Заголовок из PDO', 'Текст из PDO')");
        return $statement->execute();
*/

/*
        $statement = $this->pdo->prepare("insert into blogs (title,content) VALUES (?, ?)");

        $title = 'Заголовок из PDO2';
        $content = 'Текст из PDO2';

        $statement->bindParam( 1 , $title);
        $statement->bindParam( 2 , $content);

        $statement->execute();

        $title = 'Заголовок из PDO3';
        $content = 'Текст из PDO3';

        $statement->execute();
*/

/*
        $statement = $this->pdo->prepare("insert into blogs (title,content) VALUES (:title, :content)");

        $title = 'Заголовок из PDO4';
        $content = 'Текст из PDO4';

        $statement->bindParam( 'content' , $content);
        $statement->bindParam( 'title' , $title);



        return $statement->execute();
*/

        if(!$this->validate($values,$this->fields)) {
            return false;
        }

        $query = 'insert into ' . $this->table . ' (';
        $query .= implode(', ', array_keys($values)) . ') values (:';
        $query .= implode(', :', array_keys($values)) . ');';


        $statement = $this->pdo->prepare($query);

        return $statement->execute($values);

    }

    public function countAll() {

        $count = $this->pdo->query('select count(*) as count from ' . $this->table);

        $result = $count->fetch();

        return $result['count'];
    }


    public function validate ($values, $rules) {

        foreach ($rules as $key => $rule ) {

            if(!isset($values[$key])) {
                continue;
            }

            switch ($rule) {
                case 'text':
                    if(!is_string($values[$key])) {
                        return false;
                    }
                break;

                case 'int' :
                    if(!is_numeric($values[$key])) {
                        return false;
                    }
                break;

                default:
                    throw new \Exception('Неизвестное правило валидации');
            }

        }

        return true;

    }



}