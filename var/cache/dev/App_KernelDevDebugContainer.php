<?php

// This file has been auto-generated by the Symfony Dependency Injection Component for internal use.

if (\class_exists(\ContainerA3Q5oq7\App_KernelDevDebugContainer::class, false)) {
    // no-op
} elseif (!include __DIR__.'/ContainerA3Q5oq7/App_KernelDevDebugContainer.php') {
    touch(__DIR__.'/ContainerA3Q5oq7.legacy');

    return;
}

if (!\class_exists(App_KernelDevDebugContainer::class, false)) {
    \class_alias(\ContainerA3Q5oq7\App_KernelDevDebugContainer::class, App_KernelDevDebugContainer::class, false);
}

return new \ContainerA3Q5oq7\App_KernelDevDebugContainer([
    'container.build_hash' => 'A3Q5oq7',
    'container.build_id' => '71cfa5af',
    'container.build_time' => 1704306792,
    'container.runtime_mode' => \in_array(\PHP_SAPI, ['cli', 'phpdbg', 'embed'], true) ? 'web=0' : 'web=1',
], __DIR__.\DIRECTORY_SEPARATOR.'ContainerA3Q5oq7');