Program Resheto;
const n=255;
Var
M: set of byte;
i, dd, N: Integer;
Begin
Writeln(’Уведіть розмір проміжку (до 255)’);
Readln(N);
M:=[2..N];
For dd:=2 to N div 2 do
For i:=2 to N do
If (i mod k=0) and (i<>k)
Then           M:=M–[i]
For i:=1 to N do
If i in M
Then         Write(i:3);
Readln;
End.
