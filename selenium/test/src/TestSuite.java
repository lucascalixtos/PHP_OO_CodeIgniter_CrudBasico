

import org.junit.runner.RunWith;
import org.junit.runners.Suite;
import org.junit.runners.Suite.SuiteClasses;

import test.TarefaTest;
import test.TurmaTest;

@RunWith(Suite.class)
@SuiteClasses({
	TarefaTest.class,
	TurmaTest.class
})
public class TestSuite {}
