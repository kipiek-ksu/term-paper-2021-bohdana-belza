Program Z_29;
Procedure Viluchennya (x:char; var S:string; var k:integer);
var
  p:integer;
Begin
  k:=0;
  p:=1;
  while p<=length(S) do
    begin
      if S[p]=x
        then
          begin
            inc(k);
            delete(S,p,1);
          end
        else
          p:=p+1;
    end;
End;

Var
  S:string;
  x:char;
  k:integer;

Begin
    readln(S);
    readln (x);
    Viluchennya(x,k,S);
    writeln (S);
    writeln (k);
End.