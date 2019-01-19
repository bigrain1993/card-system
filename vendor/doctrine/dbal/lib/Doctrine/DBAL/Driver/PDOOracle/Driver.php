<?php
 namespace Doctrine\DBAL\Driver\PDOOracle; use Doctrine\DBAL\DBALException; use Doctrine\DBAL\Driver\AbstractOracleDriver; use Doctrine\DBAL\Driver\PDOConnection; class Driver extends AbstractOracleDriver { public function connect(array $params, $username = null, $password = null, array $driverOptions = array()) { try { return new PDOConnection( $this->constructPdoDsn($params), $username, $password, $driverOptions ); } catch (\PDOException $e) { throw DBALException::driverException($this, $e); } } private function constructPdoDsn(array $params) { $dsn = 'oci:dbname=' . $this->getEasyConnectString($params); if (isset($params['charset'])) { $dsn .= ';charset=' . $params['charset']; } return $dsn; } public function getName() { return 'pdo_oracle'; } } 