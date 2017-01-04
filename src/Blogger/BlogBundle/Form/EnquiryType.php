<?php
// src/Blogger/BlogBundle/Form/EnquiryType.php

namespace Blogger\BlogBundle\Form;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type;

class EnquiryType extends AbstractType
{
    public function buildForm(FormBuilderInterface $builder, array $options)
    {
        $builder->add('name');
        $builder->add('email', Type\EmailType::class);
        $builder->add('subject');
        $builder->add('body', Type\TextareaType::class);
    }

    public function getName()
    {
        return 'contact';
    }
}
