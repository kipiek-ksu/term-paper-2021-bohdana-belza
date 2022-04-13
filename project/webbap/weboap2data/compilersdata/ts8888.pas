Var n,sum:integer;

Begin
     read(n);
     while n<>0 do
           begin
                sum:=sum+(n mod 10);
                n:=n div 10;
           end;
     writeln(sum);
End.
