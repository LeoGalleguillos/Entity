<?php
namespace LeoGalleguillos\Entity;

use LeoGalleguillos\Entity\Model\Factory as EntityFactory;
use LeoGalleguillos\Entity\Model\Service as EntityService;
use LeoGalleguillos\Entity\Model\Table as EntityTable;
use LeoGalleguillos\Entity\View\Helper as EntityHelper;

class Module
{
    public function getConfig()
    {
        return [
            'view_helpers' => [
                'aliases' => [
                ],
                'factories' => [
                ],
            ],
        ];
    }

    public function getServiceConfig()
    {
        return [
            'factories' => [
                EntityFactory\EntityType::class => function ($sm) {
                    return new EntityFactory\EntityType(
                        $sm->get(EntityTable\EntityType::class)
                    );
                },
                EntityTable\Entity::class => function ($sm) {
                    return new EntityTable\Entity(
                        $sm->get('entity')
                    );
                },
                EntityTable\EntityType::class => function ($sm) {
                    return new EntityTable\EntityType(
                        $sm->get('entity')
                    );
                },
                EntityTable\Meta::class => function ($sm) {
                    return new EntityTable\Meta(
                        $sm->get('entity')
                    );
                },
            ],
        ];
    }
}
