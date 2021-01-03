<?php

namespace Base;


class Search extends DataBase
{
    /**
     *
     */
    public function getSearch()
    {
        $value = $this->getQ();
        $explodes = explode(' ', $value);
        $output = [];
        foreach ($explodes as $explode)
        {
            $output[] = 'nom_pays' . ' LIKE ' . '"%' . $explode . '%"';
        }

        return $this->query('SELECT * FROM pays WHERE ' . implode(' AND ', $output) . ' ORDER BY nom_pays')->fetchAll(\PDO::FETCH_ASSOC);

    }

    /**
     * @return mixed|string
     */
    public function getQ()
    {
        if(isset($_GET['q']))
        {
            return $_GET['q'];
        }
        if(isset($_POST['q']))
        {
            return $_POST['q'];
        }
        return '';
    }
}