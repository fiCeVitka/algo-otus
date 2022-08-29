Реализовано три алгоритма:
1. Через обычные итерации. O(N)
![](./o(n)-solution.png)

2. Через степень двойки с домножением. O(N)
![](./o(logN+ndel2)-solution.png)

3. Через двоичное разложение показателя степени. O(log N)
![](./o(log n)-solution.png)

У второго и третьего алгоритма немного не сошлись значения после плавающей точки (возможно из-за разных языков), но в целом значения верные, поэтому будем считать за успешные кейсы

Хоть у второго алгоритма класс сложности выше, но по времени выполнения он не сильно уступает третьему