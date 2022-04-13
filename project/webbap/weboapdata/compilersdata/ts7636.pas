Program z20;
Var H,S,a:Integer;
Begin
Read (H);
S:=0;
While H<>0 do begin
a:=H mod 10;
S:=S+a;
H:=H div 10;
end;
Write (S);
end.