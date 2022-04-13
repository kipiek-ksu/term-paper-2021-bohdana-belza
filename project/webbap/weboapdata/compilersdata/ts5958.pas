Type
  EXO = ^O;
    O = record
      Data : char;
      Next : EXO;
    End;

Var
  i : integer;
  O1, EndO1, O2, EndO2 : EXO;
  St, NewSt : string;

Procedure writeO(Var BeginO, EndO : EXO; k : char);
Var
  u : EXO;
Begin
  new(u);
  u^.Data := k;
  u^.Next := Nil;
  if BeginO =Nil
    then
      BeginO := u
    else
      EndO^.Next := u;
  EndO := u;
End;

Procedure readO(Var BeginO, EndO : EXO; Var c : char);
var
  u: EXO;
Begin
  c := BeginO^.Data;
  u := BeginO;
  BeginO := BeginO^.Next;
  dispose(u);
End;

procedure ModifStr(St : string; var NewSt : string);
var
  l : char;
begin
  O1 := Nil;
  EndO1 := Nil;
  O2 := Nil;
  EndO2 := Nil;
  NewSt := '';
  for i := 1 to Length(St) do
    if St[i] in ['1', '2', '3', '4', '5', '6', '7', '8', '8', '9', '0']
      then
        writeO(O2, EndO2, St[i])
      else
        writeO(O1, EndO1, St[i]);
  while O1 <> Nil do
    begin
      readO(O1, EndO1, l);
      NewSt := NewSt + l;
    end;
  while O2 <> Nil do
    begin
      readO(O2, EndO2, l);
      NewSt := NewSt + l;
    end;
End;

Begin
  readln(St);
  ModifStr(St, NewSt);
  writeln(NewSt);
End.