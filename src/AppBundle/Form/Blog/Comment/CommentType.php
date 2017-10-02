<?php

namespace AppBundle\Form\Blog\Comment;

use Symfony\Component\Form\AbstractType;
use Symfony\Component\Form\FormBuilderInterface;
use Symfony\Component\Form\Extension\Core\Type\TextareaType;
use Symfony\Component\Form\Extension\Core\Type\SubmitType;

/**
 * Form to create comments.
 *
 * @author Админ
 */
class CommentType extends AbstractType {

    public function buildForm(FormBuilderInterface $builder, array $options) {
        $builder
                ->add('content', TextareaType::class, [
                    'label' => 'Комментарий: '
                ])
                ->add('submit', SubmitType::class, [
                    'label' => 'Отправить'
                ])
        ;
    }

}
