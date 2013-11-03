<?php

use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\Config\Loader\LoaderInterface;

class AppKernel extends Kernel
{
    public function registerBundles()
    {
        $bundles = array(
            new Symfony\Bundle\FrameworkBundle\FrameworkBundle(),
            new Symfony\Bundle\SecurityBundle\SecurityBundle(),
            new Symfony\Bundle\TwigBundle\TwigBundle(),
            new Symfony\Bundle\MonologBundle\MonologBundle(),
            new Symfony\Bundle\SwiftmailerBundle\SwiftmailerBundle(),
            new Symfony\Bundle\AsseticBundle\AsseticBundle(),
            new Doctrine\Bundle\MongoDBBundle\DoctrineMongoDBBundle(),
            new Doctrine\Bundle\DoctrineBundle\DoctrineBundle(),
            new Sensio\Bundle\FrameworkExtraBundle\SensioFrameworkExtraBundle(),

            new FOS\UserBundle\FOSUserBundle(),

            //Admin deps
            new Sonata\BlockBundle\SonataBlockBundle(),
            new Sonata\jQueryBundle\SonatajQueryBundle(),
            new Knp\Bundle\MenuBundle\KnpMenuBundle(),

            // Admin Bundle
            new Sonata\DoctrineMongoDBAdminBundle\SonataDoctrineMongoDBAdminBundle(),
            new Sonata\AdminBundle\SonataAdminBundle(),

            // Media Bundle
            new Application\Sonata\MediaBundle\ApplicationSonataMediaBundle(),
            new Sonata\MediaBundle\SonataMediaBundle(),
            new Sonata\EasyExtendsBundle\SonataEasyExtendsBundle(),

            //Rest Bundle
            new FOS\RestBundle\FOSRestBundle(),
            new JMS\SerializerBundle\JMSSerializerBundle(),

            //JMS Security bundles
            new JMS\AopBundle\JMSAopBundle(),
            new JMS\SecurityExtraBundle\JMSSecurityExtraBundle(),
            new JMS\DiExtraBundle\JMSDiExtraBundle($this),

            // Mopa
            new Mopa\Bundle\BootstrapBundle\MopaBootstrapBundle(),

            //Fixtures
            new Doctrine\Bundle\FixturesBundle\DoctrineFixturesBundle(),

            //New Relic
            new Ekino\Bundle\NewRelicBundle\EkinoNewRelicBundle(),

            //Google Analytics
            new AntiMattr\GoogleBundle\GoogleBundle(),
        );

        if (in_array($this->getEnvironment(), array('dev', 'test'))) {
            $bundles[] = new Symfony\Bundle\WebProfilerBundle\WebProfilerBundle();
            $bundles[] = new Sensio\Bundle\DistributionBundle\SensioDistributionBundle();
            $bundles[] = new Sensio\Bundle\GeneratorBundle\SensioGeneratorBundle();
        }

        return $bundles;
    }

    public function registerContainerConfiguration(LoaderInterface $loader)
    {
        $loader->load(__DIR__.'/config/config_'.$this->getEnvironment().'.yml');
    }
}
