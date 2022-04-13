program summ;
var A,R:integer;
begin
    readln(A);
for i:=1 to 3 do
begin
    R:=R+(A mod 10);
    A:=(A mod 10);
end;
    writeln(R);
end.