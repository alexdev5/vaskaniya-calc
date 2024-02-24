<?php

class EuDBClass
{
    const TABLE_NAME = 'eu_customizer';
    const PAGE_CART = 'cart';

    private $cid;
    private $db;
    private $saveData = [];
    private $pageName = '';
    private $whiteList = [
        'cid' => '%d',
        'user_id' => '%d',
        'order_id' => '%d',
        'product_id' => '%d',
        'wishlist_id' => '%s',
        'cart_id' => '%s',
        'products' => '%s',
        'addons' => '%s',
        'comments' => '%s',
        'attachments' => '%s',
        'generations' => '%s',
        'routes' => '%s',
        'settings' => '%s',
        'ip' => '%s',
        'params' => '%s',
        //'created_at' => '%s',
        //'updated_at' => '%s'
    ];
    private $preparedData = [];

    public function __construct($cid = '')
    {

    }

    public static function getTableName(): string
    {
        global $wpdb;
        return $wpdb->prefix . self::TABLE_NAME;
    }

    /** Подготовить данные для записи/обновления в базу */
    public function prepareSaveData($data = []): array
    {
        $res = [];
        //$this->setIP($_SERVER['REMOTE_ADDR']);

        return $res;
    }

    public function prepareMasks(): array
    {
        $masks = [];
        $data = $this->prepareSaveData();

        foreach ($data as $key => $datum) {
            if (isset($this->whiteList[$key])) {
                $masks[] = $this->whiteList[$key];
            } else {
                $masks[] = '%s';
            }
        }
        return $masks;
    }

    public function create($array = [])
    {
        $this->prepareSaveData($array);
        $this->setRowData('created_at', current_time('mysql'));
        $this->setRowData('created_page', $this->getPageName());
        $this->setRowData('cid', $this->getCID());
        $data = $this->getPreparedData();

        try {
            $id = $this->db->insert(self::getTableName(), $this->getPreparedData()/*, $this->prepareMasks()*/);

            if (!$id) {
                $this->log($data);
                throw new Exception('Created customization field');
            }

        } catch (Exception $e) {
            $this->log($e->getMessage());
            echo 'Save error: ', $e->getMessage(), "\n";
        }
    }

    /**
     * @param array $array - update params
     */
    public function update(array $array = [])
    {

    }

    public function log($data)
    {
        error_log(print_r($data, 1));
    }

    public static function createTable()
    {
        global $wpdb;
        $table_name = self::getTableName();

        $sql = "CREATE TABLE IF NOT EXISTS `$table_name` (
            id bigint(20) unsigned NOT NULL AUTO_INCREMENT,
            cid varchar(30) NOT NULL,
            user_id bigint(20) NOT NULL default 0,
            order_id bigint(20) NOT NULL default 0,
            product_id bigint(20) NOT NULL,
            wishlist_id varchar(30) NOT NULL default 0,
            cart_id varchar(30) NULL,
            products longtext NULL default '',
            addons longtext NULL default '',
            comments longtext NULL default '',
            attachments longtext NULL default '',
            generations longtext NULL default '',
            routes varchar(256) NOT NULL default '',
            settings varchar(256) NOT NULL default '',
            ip varchar(10) NOT NULL default '',
            params longtext NOT NULL,
            created_page varchar(20) NOT NULL default '',
            updated_page varchar(20) NOT NULL default '',
            created_at datetime NOT NULL,
            updated_at datetime NOT NULL,
            PRIMARY KEY (id),
            KEY cid (cid)
        )";

        $wpdb->query($sql);
    }
}