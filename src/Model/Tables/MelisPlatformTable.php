<?php 

/**
 * Melis Technology (http://www.melistechnology.com)
 *
 * @copyright Copyright (c) 2015 Melis Technology (http://www.melistechnology.com)
 *
 */

namespace MelisDemoCms\Model\Tables;

use Zend\Db\TableGateway\TableGateway;
use MelisEngine\Model\Tables\MelisGenericTable;

class MelisPlatformTable extends MelisGenericTable
{
	public function __construct(TableGateway $tableGateway)
	{
		parent::__construct($tableGateway);
		$this->idField = 'plf_id';
	}
}
