package test;

import static org.junit.Assert.assertTrue;

import org.junit.Test;

import page.TarefaPage;
import page.TurmaPage;

public class TurmaTest extends BaseTest{

	@Test
	public void selecionaTurmaParaCriarTarefa() {
		
		TurmaPage turmaPage = new TurmaPage(driver);
		TarefaPage tarefaPage = turmaPage.selecionaTurma(1);
		boolean b = tarefaPage.temNomeTurma("5º Ano A");
		assertTrue("Erro na seleção de turma", b);
		
		b = ! tarefaPage.temTarefas();
		assertTrue("Não deveria haver tarefas na página", b);
		
		b = tarefaPage.formularioOculto();
		assertTrue("O formulário de cadastro das tarefas deveria estar oculto", b);

		b = tarefaPage.formularioExibido();
		assertTrue("O formulário de cadastro das tarefas deveria estar na tela", b);
		
	}

}
