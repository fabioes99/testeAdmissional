# testeAdmissional

Utilizei o php artisan serve e as migrations para criar o banco de dados(MySql)

Utilizei o jetstream e o livewire para autenticação

Dentro do banco eu criei um trigger para um requisito específico
sendo ele:

~~~mysql

DELIMITER $$

CREATE TRIGGER tr_chamadoResposta_insert
AFTER INSERT ON chamado_respostas
FOR EACH ROW
BEGIN
    DECLARE chamado_status VARCHAR(255);
    SELECT status INTO chamado_status FROM chamados WHERE id = NEW.chamado_id;

    IF chamado_status = 'Aberto' THEN
        UPDATE chamados SET status = 'em atendimento' WHERE id = NEW.chamado_id;
    END IF;
END $$

DELIMITER ;

~~~
