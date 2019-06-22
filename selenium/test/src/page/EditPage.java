package page;

import org.openqa.selenium.By;
import org.openqa.selenium.WebDriver;
import org.openqa.selenium.WebElement;

public class EditPage extends BasePage {

	public EditPage(WebDriver driver, int tarefa_id) {
		super(driver, "editar/" + tarefa_id);
	}

	public TarefaPage alteraDadosTarefa(int turma_id) {
		WebElement prazo = driver.findElement(By.name("prazo"));
		WebElement titulo = driver.findElement(By.name("titulo"));
		
		prazo.clear();
		titulo.clear();
		prazo.sendKeys("2019-06-07");		
		titulo.sendKeys("Tarefa editada com sucesso");
		driver.findElement(By.className("btnupload-form")).click();
		
		return new TarefaPage(driver, turma_id);
	}

}
