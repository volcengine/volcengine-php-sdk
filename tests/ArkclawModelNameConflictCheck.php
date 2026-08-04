<?php

require_once __DIR__ . '/../src/Common/ModelInterface.php';
require_once __DIR__ . '/../src/Common/ObjectSerializer.php';

use Volcengine\Common\ModelInterface;
use Volcengine\Common\ObjectSerializer;

$models = [
    'ClawInstanceForGetClawInstanceOutput',
    'ClawInstanceForListClawInstancesOutput',
    'CreateClawInstanceRequest',
    'ModelConfigForGetClawOmniInstanceOutput',
    'ModelConfigForListClawOmniInstancesOutput',
];

foreach ($models as $model) {
    require_once __DIR__ . '/../src/Arkclaw/Model/' . $model . '.php';

    $class = 'Volcengine\\Arkclaw\\Model\\' . $model;
    $instance = new $class(['model_name' => 'doubao-seed']);

    if (!$instance instanceof ModelInterface) {
        throw new RuntimeException($model . ' must implement ModelInterface.');
    }

    if ($instance->getModelName() !== 'doubao-seed') {
        throw new RuntimeException($model . ' does not retain the model_name constructor value.');
    }

    if ($class::getters()['model_name'] !== 'getModelName') {
        throw new RuntimeException($model . ' has an invalid model_name getter mapping.');
    }

    if ($class::setters()['model_name'] !== 'setModelName') {
        throw new RuntimeException($model . ' has an invalid model_name setter mapping.');
    }

    $instance->setModelName('doubao-pro');
    if ($instance->getModelName() !== 'doubao-pro') {
        throw new RuntimeException($model . ' does not retain the model_name setter value.');
    }

    $serialized = ObjectSerializer::sanitizeForSerialization($instance);
    if (!isset($serialized->ModelName) || $serialized->ModelName !== 'doubao-pro') {
        throw new RuntimeException($model . ' does not serialize ModelName.');
    }

    $deserialized = ObjectSerializer::deserialize((object)['ModelName' => 'doubao-lite'], $class);
    if ($deserialized->getModelName() !== 'doubao-lite') {
        throw new RuntimeException($model . ' does not deserialize ModelName.');
    }
}

echo "Arkclaw model_name conflict check passed." . PHP_EOL;
