<?php
class Helper
{
    public function breadcum()
    {
?>
        <div class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1 class="m-0">Starter Page</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a href="#">Home</a></li>
                            <li class="breadcrumb-item active">Starter Page</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div><!-- /.container-fluid -->
        </div>
<?php
    }

    public function add_category($data)
    {
        $conn = $GLOBALS['conn'];
        $title = $data['title'];
        $param = [
            'title' => $title
        ];

        $sql = "SELECT * FROM categories WHERE title = $title";
        $result = $conn->query($sql);
        $category = $result->fetch_assoc();

        if (!empty($category)) {
            $this->_ddd($category);
        }

        $this->save('categories', $param);

        $this->_ddd($data);
    }

    public function _dd($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
    }

    public function _ddd($data)
    {
        echo '<pre>';
        print_r($data);
        echo '</pre>';
        die;
    }

    public function save($table_name, $data)
    {
        $fields = '';
        $values = '';

        $conn = $GLOBALS['conn'];
        foreach ($data as $k => $v) {
            $fields .= $k . ',';
        }

        foreach ($data as $k => $v) {
            $values .= "'" . $v . "',";
        }

        $fields = trim($fields, ',');
        $values = trim($values, ',');

        $sql = "INSERT INTO $table_name ($fields) VALUES ($values)";

        if ($conn->query($sql) === TRUE) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    }

    public function first($table_name, $condition)
    {
        $conn = $GLOBALS['conn'];
    }
}
