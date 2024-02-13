<?php

namespace App\DTO;

use App\Entity\Question;
use Symfony\Component\Validator\Constraints as Assert;

class QuestionDTO
{
    #[Assert\NotBlank(message: "askerName.not_blank")]
    private ?string $askerName;

    #[Assert\NotBlank(message: "email.not_blank")]
    #[Assert\Email(message: "email.wrong")]
    private ?string $email;

    #[Assert\NotBlank(message: "question.not_blank")]
    private ?string $question;

    public function __construct(
        ?string $askerName,
        ?string $email,
        ?string $question,
    )
    {
        $this->askerName = $askerName;
        $this->email = $email;
        $this->question = $question;
    }

    public static function fromEntity(Question $question): self
    {
        return new self(
            $question->getAskerName(),
            $question->getEmail(),
            $question->getQuestion()
        );
    }

    public function toEntity(): Question
    {
        $question = new Question();

        $question->setAskerName($this->askerName);
        $question->setEmail($this->email);
        $question->setQuestion($this->question);

        return $question;
    }

    public function getAskerName(): string
    {
        return $this->askerName;
    }

    public function setAskerName(string $askerName): self
    {
        $this->askerName = $askerName;
        return $this;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function setEmail(string $email): self
    {
        $this->email = $email;
        return $this;
    }

    public function getQuestion(): string
    {
        return $this->question;
    }

    public function setQuestion(string $question): self
    {
        $this->question = $question;
        return $this;
    }
}
