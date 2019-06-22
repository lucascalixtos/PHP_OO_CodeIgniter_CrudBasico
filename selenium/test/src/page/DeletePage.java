package page;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;

public class DeletePage extends BasePage {

	public DeletePage(WebDriver driver, int tarefa_id) {
		super(driver, "deletar/" + tarefa_id);
	}
	
	public TarefaPage removeTarefa(int turma_id) {
		driver.findElement(By.className("delete-btn")).click(); 
		return new TarefaPage(driver, turma_id);
	}

}
