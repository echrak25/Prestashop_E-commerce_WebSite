<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerDmIivPr\appAppKernelProdContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerDmIivPr/appAppKernelProdContainer.php') {
    touch(__DIR__.'/ContainerDmIivPr.legacy');

    return;
}

if (!\class_exists(appAppKernelProdContainer::class, false)) {
    \class_alias(\ContainerDmIivPr\appAppKernelProdContainer::class, appAppKernelProdContainer::class, false);
}

return new \ContainerDmIivPr\appAppKernelProdContainer([
    'container.build_hash' => 'DmIivPr',
    'container.build_id' => '84ed9bdb',
    'container.build_time' => 1712951776,
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerDmIivPr');
