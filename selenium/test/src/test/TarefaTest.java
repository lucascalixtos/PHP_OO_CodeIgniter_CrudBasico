package test;

import static org.junit.Assert.assertTrue;

import org.junit.Test;

import page.DeletePage;
import page.EditPage;
import page.TarefaPage;

public class TarefaTest extends BaseTest {

	@Test
	public void criaTarefa() {
		TarefaPage tarefaPage = new TarefaPage(driver, 2);
		boolean b = tarefaPage.criaTarefas();
		assertTrue("As tarefas não foram criadas", b);
	}
	
	@Test
	public void editaTarefa() {
		int tarefa_id = 1;
		int turma_id = 2;
		
		TarefaPage tarefaPage = new TarefaPage(driver, turma_id);
		EditPage editPage = tarefaPage.editaTarefas(tarefa_id);
		tarefaPage = editPage.alteraDadosTarefa(turma_id);
		boolean b = tarefaPage.comfirmaEdicao();
		assertTrue("Erro na edição de tarefas", b);	
	}
	
	@Test
	public void removeTarefa() {
		int tarefa_id = 1;
		int turma_id = 3;
		
		TarefaPage tarefaPage = new TarefaPage(driver, turma_id);
		DeletePage deletePage = tarefaPage.removeTarefa(tarefa_id);
		tarefaPage = deletePage.removeTarefa(turma_id);
		boolean b = tarefaPage.comfirmaRemocao();
		assertTrue("Erro na remoção de tarefas", b);	
	}
	
}
